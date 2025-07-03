<?php
include 'header.php';
include 'menu.php';
$ID_principal = $_SESSION['ID_principal'];
$ID = $_SESSION['ID'];
// -----------------------------------------------------
// impoltante tener estas dos variables para el formulario auotomatico
$tabla = "sinvetrios";
$idUpdate = base64_decode($_GET['FAID']);
// -----------------------------------------------------
$query = "SELECT * from $tabla where ID = $idUpdate limit 1;";
$result = mysqli_query($conn3, $query);
$row = mysqli_fetch_array($result);

$categoria = funcionMaster($row['tipo'], 'id', 'tipo', 'scategoria');

// 13 05 2023
// validación para ver si este inventario ya se le hizo carga de matriz inicial
// si es el caso entonces actualizamos el resto para bloquear la edicion de inventario
// -----------------------------------------------------
$queryValidarCarga = "SELECT count(primeraCarga) as carga from SinvDep where idSinvetrios = $idUpdate and primeraCarga = 1";
$resultValidarCarga = mysqli_query($conn3, $queryValidarCarga);
$rowValidarCarga = mysqli_fetch_assoc($resultValidarCarga);
if ($rowValidarCarga['carga'] > 0) {
    mysqli_query($conn3, "UPDATE SinvDep set primeraCarga = 1, primeraCargaF = now() where idSinvetrios = $idUpdate");
}

$QueryInventario = mysqli_query($conn3, "SELECT *  from sinvetrios where ID = $idUpdate");
while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
    $NombreInventario = $RowInventario['descripcion'];
}

$QueryDepartamento = mysqli_query($conn3, "SELECT *  from scategoria where id = $row[tipo]");
while ($RowDepartamento = mysqli_fetch_array($QueryDepartamento)) {
    $maneja_serial = $RowDepartamento['maneja_serial'];
    $caracter_serial = $RowDepartamento['caracter_serial'];
}

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <br>

    <section class="content">

        <div class="box box-info" align="center">

            <div class="card-body">

                <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <h2>Inventario </h2>
                    </div>
                    <div class="col-md-3">
                        <?php if ($idUpdate) : ?>
                            <a href="IN_Inventario" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                    </div>
                </div>


                <div class="tab-content">
                    <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                        <!-- nuevo -->

                        <div class="form-row">
                            <!-- producto simple t1/ sin serial/con serial -->
                            <?php if ($categoria == 1): ?>
                                <div class="col-md-12 center text-center">
                                    <h3 class="text-primary">Producto Simple <?php if ($maneja_serial == 1) {
                                                                                    echo " - [Serial]";
                                                                                } ?></h3>
                                    <hr>
                                    <h4 class="text-success"><?= $NombreInventario; ?></h4><br>
                                </div>
                                <?php
                                $configDep = "SELECT * from dep where ID_principal = $ID_principal";
                                $resultDep = mysqli_query($conn3, $configDep);
                                while ($rowDep = mysqli_fetch_array($resultDep)) {
                                    $rowDepArray = $rowDep;
                                    $queryVerificar = "SELECT * from SinvDep where tipo = '{$row['tipo']}' and idSinvetrios = '{$row['ID']}' and idDep = '{$rowDep['id']}'";
                                    $resultVerificar = mysqli_query($conn3, $queryVerificar);
                                    if (mysqli_num_rows($resultVerificar) == 0) {
                                        // insertar
                                        $queryInsertar = "INSERT INTO SinvDep set tipo = '{$row['tipo']}', idSinvetrios = '{$row['ID']}', idDep = '{$rowDep['id']}', talla = '{$tallas[$i]}', color = '{$colores[$j]}'";
                                        $resultInsertar = mysqli_query($conn3, $queryInsertar);
                                    }
                                }

                                $arrayTable = [
                                    'Deposito',
                                    'Existencia',
                                ];
                                ?>
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $querytyC = "SELECT * from SinvDep where idSinvetrios = '{$row['ID']}'";
                                            $resulttyC = mysqli_query($conn3, $querytyC);
                                            while ($rowtyC = mysqli_fetch_array($resulttyC)) { ?>
                                                <tr>
                                                    <td><?= funcionMaster($rowtyC['idDep'], 'id', 'descripcion', 'dep') ?></td>
                                                    <td>
                                                        <!--
                                                                                    <input type="number" step="1" name="datos[existencia]" class="form-control" onchange="
                                                                                    automaticUpdate(this.value,'existencia','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('1','primeraCarga','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('<?= date('Y-m-d H:i:s') ?>','primeraCargaF','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    " value="<?= $rowtyC['existencia'] ?>" <?= ($rowtyC['primeraCarga'] > 0 ? 'readonly' : '') ?>>
                                                                                    -->

                                                        <?php
                                                        if ($maneja_serial == "1"):
                                                        ?>
                                                            <input type="number" step="1" name="datos[existencia]" class="form-control" value="<?= $rowtyC['existencia'] ?>" id="CampoExistencias_<?= $rowtyC['id'] ?>" readonly><br>
                                                            <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="BotonCampoExistencias_<?= $rowtyC['id'] ?>" onclick="ModalModuloExistenciasActivos(<?= $rowtyC['id'] ?>)" <?= ($rowtyC['primeraCarga'] > 0 ? 'disabled' : '') ?>>Agregar Existencias</button>
                                                        <?php else: ?>

                                                            <input type="number" step="1" name="datos[existencia]" class="form-control" onchange="
                                                                                    automaticUpdate(this.value,'existencia','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('1','primeraCarga','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('<?= date('Y-m-d H:i:s') ?>','primeraCargaF','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    " value="<?= $rowtyC['existencia'] ?>" <?= ($rowtyC['primeraCarga'] > 0 ? 'readonly' : '') ?>>

                                                        <?php endif; ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php endif ?>
                            <!-- producto simple t1/sin serial/con serial -->




                            <!-- Servicios t2 -->
                            <?php if ($categoria == 2) : ?>
                                <div class="col-md-12 center text-center">
                                    <h3 class="text-primary">Servicio</h3>
                                    <hr>
                                    <h4 class="text-success"><?= $NombreInventario; ?></h4><br>
                                </div>
                                <div class="col-md-12">
                                    <div class="center text-center">
                                        <h4 class="text-primary">Servicios</h4>
                                        <h5 class="text-muted">Nada que modificar aquí</h5>
                                    </div>
                                </div>
                            <?php endif ?>
                            <!-- Servicios t2 -->

                            <!-- compuestos t3 -->
                            <?php if ($categoria == 3) : ?>
                                <div class="col-md-12 center text-center">
                                    <h3 class="text-primary">Producto Compuesto</h3>
                                    <hr>
                                    <h4 class="text-success"><?= $NombreInventario; ?></h4><br>
                                </div>
                                <?php
                                $arrayCompuesto = explode('|/|', $row['compuestos']);
                                $arrayTable = [
                                    'Inventario',
                                    'cantidad',
                                    ''
                                ];
                                ?>
                                <div class="col-md-12">
                                    <form id="compuestos-form">
                                        <input type="hidden" name="datos[idCompuesto]" value="<?= $row['ID'] ?>">
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label>Inventario</label>
                                                <select required class="form-control select2" name="datos[idSinvetrios]" id="">
                                                    <?php
                                                    /*
                                                                                $queryInventario = "SELECT si.* from sinvetrios si
                                                                                    inner join scategoria sc on si.tipo = sc.id
                                                                                    where sc.tipo not in (2,3,4,5)";*/
                                                    $queryInventario = "SELECT si.* from sinvetrios si
                                                                                    inner join scategoria sc on si.tipo = sc.id
                                                                                    where sc.tipo = '1' ";
                                                    $resultInventario = mysqli_query($conn3, $queryInventario);
                                                    while ($rowInventario = mysqli_fetch_array($resultInventario)) {
                                                    ?>
                                                        <option value="<?= $rowInventario['ID'] ?>"><?= $rowInventario['descripcion'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Cantidad</label>
                                                <input type="number" step="1" name="datos[cantidad]" class="form-control" value="1" required>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <input type="hidden" name="datos[activo]" value="1">
                                                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="$('#compuestos-form').automaticForm({type: '1',table: 'SinvComp', reload:'', page:'IN_InventarioCategoria?FAID=<?= base64_encode($row['ID']) ?>'});">
                                                    <i class="fa fa-plus"></i>
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $queryCompuestos = "SELECT * from SinvComp where idCompuesto = '{$row['ID']}' and activo = 1";
                                            $resultCompuestos = mysqli_query($conn3, $queryCompuestos);
                                            while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                                            ?>
                                                <tr>
                                                    <td><?= funcionMaster($rowCompuestos['idSinvetrios'], 'ID', 'descripcion', 'sinvetrios') ?></td>
                                                    <td><?= $rowCompuestos['cantidad'] ?></td>
                                                    <td>
                                                        <button id="eliminar-<?= $rowCompuestos['id'] ?>" type="button" class="btn btn-danger btn-sm" onclick="automaticUpdate('0','activo','SinvComp','<?= $rowCompuestos['id'] ?>'); document.getElementById('eliminar-<?= $rowCompuestos['id'] ?>').setAttribute('disabled', 'disabled'); ">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            <?php endif ?>
                            <!-- compuestos t3 -->



                            <!-- lotes t5 -->
                            <?php if ($categoria == 5) : ?>
                                <div class="col-md-12 center text-center">
                                    <h3 class="text-primary">Producto con Lotes</h3>
                                </div>
                                <?php
                                $arrayCompuesto = explode('|/|', $row['compuestos']);
                                $arrayTable = [
                                    'Deposito',
                                    'Lote',
                                    'Existencia',
                                ];
                                ?>
                                <div class="col-md-12">
                                    <form id="lotes-form">
                                        <input type="hidden" name="datos[tipo]" value="<?= $row['tipo'] ?>">
                                        <input type="hidden" name="datos[idSinvetrios]" value="<?= $row['ID'] ?>">
                                        <input type="hidden" name="datos[primeraCarga]" value="1">
                                        <input type="hidden" name="datos[primeraCargaF]" value="<?= date('Y-m-d H:i:s') ?>">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label>Deposito</label>
                                                <select required class="form-control select2" name="datos[idDep]" id="">
                                                    <?php
                                                    $ID_principal = $_SESSION['ID_principal'];
                                                    $queryDep1 = "SELECT * from dep where activo = 1 and ID_principal = $ID_principal";
                                                    $resultDep = mysqli_query($conn3, $queryDep1);
                                                    while ($rowDep = mysqli_fetch_array($resultDep)) {
                                                    
                                                    echo '<option value="' . $rowDep['id'] . '">' . $rowDep['descripcion'] . '</option>';
                                                }?>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Lote</label>
                                                <input type="text" name="datos[lote]" class="form-control" required>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">Existencia</label>
                                                <input type="number" step="1" name="datos[existencia]" class="form-control" value="1" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha Expedición</label>
                                                <input type="date" name="datos[fechaExpedicion]" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Fecha Vencimiento</label>
                                                <input type="date" name="datos[fechaVencimiento]" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="$('#lotes-form').automaticForm({type: 1,table: 'SinvDep', reload:'', page:'IN_InventarioCategoria?FAID=<?= base64_encode($row['ID']) ?>'});">
                                                    <i class="fa fa-plus"></i>
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th class="text-center"><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $queryCompuestos = "SELECT * from SinvDep where idSinvetrios = '{$row['ID']}'";
                                            $resultCompuestos = mysqli_query($conn3, $queryCompuestos);
                                            while ($rowCompuestos = mysqli_fetch_array($resultCompuestos)) {
                                                echo '<tr>';
                                                echo '<td class="text-center">' . funcionMaster($rowCompuestos['idDep'], 'ID', 'descripcion', 'dep') . '</td>';
                                                echo '<td class="text-center">' . $rowCompuestos['lote'] . '</td>';
                                                echo '<td class="text-center">' .$rowCompuestos['fechaExpedicion'] .' - '.$rowCompuestos['fechaVencimiento']. '</td>';
                                                echo '<td class="text-center"> <button class="btn btn-danger btn-sm" onclick="borrarLote(' . $rowCompuestos['id'] . ')"><i class="fa fa-trash"></i></button> </td>';
                                             
                                                echo '</tr>';
                                            }
                                            ?>
                                                
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th class="text-center"><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            <?php endif ?>
                            <!-- lotes t5 -->















                            <!-- Activo t6 -->
                            <?php if ($categoria == 6) : ?>
                                <div class="col-md-12 center text-center">
                                    <h3 class="text-primary">Activo</h3>
                                    <hr>
                                    <h4 class="text-success"><?= $NombreInventario; ?></h4><br>
                                </div>
                                <?php
                                $configDep = "SELECT * from dep where ID_principal = $ID_principal";
                                $resultDep = mysqli_query($conn3, $configDep);
                                while ($rowDep = mysqli_fetch_array($resultDep)) {
                                    $rowDepArray = $rowDep;
                                    $queryVerificar = "SELECT * from SinvDep where tipo = '{$row['tipo']}' and idSinvetrios = '{$row['ID']}' and idDep = '{$rowDep['id']}'";
                                    $resultVerificar = mysqli_query($conn3, $queryVerificar);
                                    if (mysqli_num_rows($resultVerificar) == 0) {
                                        // insertar
                                        $queryInsertar = "INSERT INTO SinvDep set tipo = '{$row['tipo']}', idSinvetrios = '{$row['ID']}', idDep = '{$rowDep['id']}', talla = '{$tallas[$i]}', color = '{$colores[$j]}'";
                                        $resultInsertar = mysqli_query($conn3, $queryInsertar);
                                    }
                                }

                                $arrayTable = [
                                    'Deposito',
                                    'Existencia',
                                ];
                                ?>
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $querytyC = "SELECT * from SinvDep where idSinvetrios = '{$row['ID']}'";
                                            $resulttyC = mysqli_query($conn3, $querytyC);
                                            while ($rowtyC = mysqli_fetch_array($resulttyC)) { ?>
                                                <tr>
                                                    <td><?= funcionMaster($rowtyC['idDep'], 'id', 'descripcion', 'dep') ?></td>
                                                    <td>

                                                        <?php
                                                        if ($maneja_serial == "1"):
                                                        ?>
                                                            <input type="number" step="1" name="datos[existencia]" class="form-control" value="<?= $rowtyC['existencia'] ?>" id="CampoExistencias_<?= $rowtyC['id'] ?>" readonly><br>
                                                            <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" id="BotonCampoExistencias_<?= $rowtyC['id'] ?>" onclick="ModalModuloExistenciasActivos(<?= $rowtyC['id'] ?>)" <?= ($rowtyC['primeraCarga'] > 0 ? 'disabled' : '') ?>>Agregar Existencias</button>
                                                        <?php else: ?>

                                                            <input type="number" step="1" name="datos[existencia]" class="form-control" onchange="
                                                                                    automaticUpdate(this.value,'existencia','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('1','primeraCarga','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    automaticUpdate('<?= date('Y-m-d H:i:s') ?>','primeraCargaF','SinvDep','<?= $rowtyC['id'] ?>');
                                                                                    " value="<?= $rowtyC['existencia'] ?>" <?= ($rowtyC['primeraCarga'] > 0 ? 'readonly' : '') ?>>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <?php for ($i = 0; $i < count($arrayTable); $i++) : ?>
                                                    <th><?= $arrayTable[$i] ?></th>
                                                <?php endfor ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <?php endif ?>
                            <!-- Activo t6 -->



                            <input type="hidden" name="datos[usuario_id]" value="<?php echo $_SESSION['ID'] ?>">

                        </div>
                        <hr>
                        <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="alerts({title: 'Datos Actualizados',text: '',icon:'info',page:'IN_Inventario'});">Guardar</button>




                    </div>

                </div>

                <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


            </div>




    </section>

    <?php echo $mensaje_registro_patients; ?>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->






<?php include 'footer.php' ?>


<script>
    function ModalModuloExistenciasActivos(id) {
        $('#ModalExistenciasActivos').modal('show');

        document.getElementById('Div_CamposSeriales').innerHTML = '';
        document.getElementById('ExistenciasActivos').value = '0';
        $('#SinvDep_Modal').val(id);
    }

    function AgregarCamposSeriales(valor) {
        var ValorExistencias = valor.value;

        var Campos = "";
        for (let index = 1; index <= ValorExistencias; index++) {

            Campos += `
            <div class="col-md-12">
                <div align="left"> Serial - #` + index + `</div>
                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><?= $caracter_serial; ?></span>
                    </div>
                    <input type="text" class="form-control input-lg campo-serial" name="ArregloExistencias[` + index + `]"  onchange="verificarCampo(this)" required  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                    <br>
                </div>
            </div>
            `;

        }

        document.getElementById('Div_CamposSeriales').innerHTML = Campos;
    }

    function GuardarDatosExistenciasActivos() {
        event.preventDefault();
        var formData = $('#FormularioExistenciasSerial').serialize();

        $.ajax({
            type: "POST",
            url: "IN_Ajax.php",
            data: {
                formulario: formData,
                Tipo_Consulta: "Agregar Seriales Producto"
            },
            success: function(response) {
                var Sinvdep = document.getElementById('SinvDep_Modal').value;
                var ExistenciasActivos = document.getElementById('ExistenciasActivos').value;

                document.getElementById('CampoExistencias_' + Sinvdep).value = ExistenciasActivos;

                //actualizar datos en sinvdep
                automaticUpdate(ExistenciasActivos, 'existencia', 'SinvDep', Sinvdep);
                automaticUpdate('1', 'primeraCarga', 'SinvDep', Sinvdep);
                automaticUpdate('<?= date('Y-m-d H:i:s') ?>', 'primeraCargaF', 'SinvDep', Sinvdep);


                document.getElementById('BotonCampoExistencias_' + Sinvdep).disabled = true;
                $('#ModalExistenciasActivos').modal('hide');

                document.getElementById('Div_CamposSeriales').innerHTML = '';
                document.getElementById('ExistenciasActivos').value = '0';
            }
        });

    }

    function BuscarSerialRegistrado(campo) {
        //console.log(campo);
        var Sinvdep = document.getElementById('SinvDep_Modal').value;

        $.ajax({
            type: "POST",
            url: "IN_Ajax.php",
            data: {
                serial: campo.value,
                Sinvdep: Sinvdep,
                Tipo_Consulta: "Buscar Serial Registrado"
            },
            success: function(response) {
                var Arreglo = JSON.parse(response);
                if (Arreglo.Estado == "Existe") {
                    campo.value = "";
                    Swal.fire(
                        'Duplicado!',
                        '¡El serial ya se encuentra Registrado!',
                        'warning'
                    );

                }
            }

        })
    }

    function verificarCampo(campoActual) {
        // Envuelve campoActual en jQuery para utilizar la función val()
        const valorActual = $(campoActual).val();

        // Verifica la longitud del campo
        if (valorActual.length !== 20) {
            alert('¡El campo debe tener 20 dígitos! Se borrará el campo.');
            $(campoActual).val(''); // Borra el campo si la longitud no es 20
            return;
        }

        // Verifica duplicados
        $('.campo-serial').not(campoActual).each(function() {
            if ($(this).val() === valorActual) {
                //alert('¡El serial ya existe en otro campo!');
                Swal.fire(
                    'Duplicado!',
                    '¡El serial ya existe en otro campo!',
                    'warning'
                );
                $(campoActual).val(''); // Borra el campo si hay duplicados
                return false; // Detiene el bucle cuando se encuentra un duplicado
            }


        });

        BuscarSerialRegistrado(campoActual);
    }

    function generarNumero() {

        let numeroAleatorio = Math.random();

        let numeroCon20Digitos = Math.floor(numeroAleatorio * Math.pow(10, 20));
        let resultado = String(numeroCon20Digitos).padStart(20, '0');

        //resultado ="11111111111111111111";
        return resultado;
    }


    function asignarSeriales() {
        $('.campo-serial').each(function() {
            //console.log($(this).name);
            var numeroGenerado = generarNumero();
            $(this).val(numeroGenerado);
            $(this).trigger('change');
        });
    }

    // Agregar evento de clic al botón para generar y asignar números
    $(document).on('click', '#generarNumeros', function() {
        asignarSeriales();
    });
</script>

<style>
    .input-group {
        position: relative;
    }

    .icono-input {
        position: absolute;
        left: 10px;
        /* Ajusta el valor según sea necesario */
        top: 50%;
        transform: translateY(-50%);
    }
</style>

<!-- El Modal -->
<div class="modal fade" id="ModalExistenciasActivos">
    <div class="modal-dialog modal-lg" style="margin-top: 170px;">
        <div class="modal-content">

            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title">Modulo Seriales</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Agregar un botón para generar números -->
            <button id="generarNumeros" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Generar Seriales Automáticos</button>

            <!-- Contenido del Modal -->
            <form onsubmit="GuardarDatosExistenciasActivos();" id="FormularioExistenciasSerial" method="POST">
                <div class="modal-body row" id="ModalCamposSerialExistencias">

                    <div class="form-group col-md-12">
                        <div align="left"> Existencias </div>
                        <input type="number" step="1" class="form-control input-lg" id="ExistenciasActivos" value="0" min="1" onchange="AgregarCamposSeriales(this);">
                    </div>

                    <div class="form-group col-md-12" id="Div_CamposSeriales">

                    </div>

                    <input type="hidden" name="SinvDep" id="SinvDep_Modal">
                    <input type="hidden" name="usuario_id" id="usuario_id_modal" value="<?php echo $_SESSION['ID'] ?>">
                </div>

                <!-- Pie del Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    function borrarLote(sinvdepid) {
        Swal.fire({
            title: '¿Estas seguro de eliminar este registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    type: 'POST',
                    url: '<?= $Base ?>ajax_borrarLote.php',
                    data: {                        
                       tchai: btoa(sinvdepid),
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        // console.log(data);
                        if (data['estatus']) {
                            Swal.fire({
                                title: 'Eliminado',
                                text: 'Se ha eliminado correctamente',
                                icon: 'success'
                            }).then((result) => {
                                if (result.isConfirmed) {                                    
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: data['msg'],
                                icon: 'error'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            }
        });
    }
</script>