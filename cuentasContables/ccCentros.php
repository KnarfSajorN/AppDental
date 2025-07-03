<?php
include '../header.php';
include '../menu.php';

if ($_GET['i']) {
    // editar la vaina
    $idCentro = base64_decode($_GET['i']);
    $queryCentro = "SELECT * from CcentroCostos where id='$idCentro' limit 1";
    $resultCentros = mysqli_query($conn3, $queryCentro);
    $rowCentro = mysqli_fetch_array($resultCentros);
}


?>
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
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
                                    <h4><?= ($rowBanco != null ? 'Actualizar' : 'Registrar') ?> Centro de Costos</h4>
                                </div>
                            </div>
                            <form action="<?=($rowCentro == null ? './cuentasContables/registroCcentroCostos.php' : './cuentasContables/actualizarCcentroCostos.php')?>" method="POST">
                                    <div class="modal-body">
                                      <div class="col-md-12 row">
                                        <div class="col-md-6 mt-3">
                                          <label>Es un sub-Centro de Costos? <strong class="text-danger">*</strong></label><br>
                                          <div class="position-relative form-group">
                                            <div>
                                              <div class="position-relative form-check">
                                                <label class="form-check-label"><input <?=($rowCentro['subCentro'] == 1 ? 'checked' : '')?> name="tap" onclick="verSelect(this.value)" value="1" type="radio" class="form-check-input">Si</label>
                                              </div>
                                              <div class="position-relative form-check">
                                                <label class="form-check-label"><input <?=($rowCentro['subCentro'] == 0 ? 'checked' : '')?> name="tap" onclick="verSelect(this.value)" value="2" type="radio" class="form-check-input">No</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6 mt-3" style="display:none" id="form-centro">
                                          <label>Centro de Costo Principal<strong class="text-danger">*</strong></label><br>
                                          <select name="centroPrincipal_id" class="form-control input-lg" >
                                            <option value="0">Ninguno Seleccionado</option>
                                            <?php 
                                            $queryList=mysqli_query($conn3,"SELECT * from CcentroCostos where subCentro=0 and centroPrincipal_id=0");
                                            $nrowl=mysqli_num_rows($queryList);
                                            while($rowMotorizado=mysqli_fetch_array($queryList))
                                            {
                                              echo'<option value="'.$rowMotorizado['id'].'" '.($rowCentro['centroPrincipal_id'] == $rowMotorizado['id'] ? 'selected' : '').' >'.$rowMotorizado['descripcion'].'</option>';
                                            }
                                            ?>
                                          </select> 
                                        </div>
                                        <div class="col-md-12 mt-3">
                                          <label>Descripción <strong class="text-danger">*</strong></label><br>
                                          <input type="text" required placeholder="Descripción" name="descripcion" value="<?= $rowCentro['descripcion'] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-12 mt-3 ">
                                          <label><strong class="text-danger"></strong></label><br>
                                          <div class="position-relative form-group">
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                              <input type="checkbox" value="1" name="pre" id="pre" class="custom-control-input" <?=($rowCentro['pre'] == 1 ? 'checked' : '')?> >
                                              <label class="custom-control-label" for="pre">Maneja Presupuesto</label>
                                            </div>
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                              <input type="checkbox" value="1" name="mov" id="mov" class="custom-control-input" <?=($rowCentro['mov'] == 1 ? 'checked' : '')?>>
                                              <label class="custom-control-label" for="mov">Centro de Movimiento</label>
                                            </div>
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                              <input type="checkbox" value="1" name="act" id="act" class="custom-control-input" <?=($rowCentro['act'] == 1 ? 'checked' : '')?>>
                                              <label class="custom-control-label" for="act">Activo</label>
                                            </div>
                                          </div>
                                        </div>                                        
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($rowCentro != null) : ?>
                                          <input type="hidden" name="idcentro" value="<?= $rowCentro['id'] ?>">
                                          <input type="hidden" name="estado" value="1">
                                        <?php endif ?>
                                      <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-outline-info rounded-pill">Guardar Registro</button>
                                    </div>
                                  </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Lista de Centros de Costos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped w-100" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnas = [
                                        'Código',
                                        'Descripción',
                                        'Maneja Presupuesto',
                                        'Centro de Movimiento',
                                        'Activo',
                                        'Estado',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tfoot>
                                </table>
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

<script>
    var titulo_tabla = 'Bancos';
    query_tabla_ajax = '<?= "SELECT * from CcentroCostos" ?>';
    columnas = ['id', 'codigo', 'descripcion', 'fechaReg', 'horaReg', 'pre', 'mov', 'act', 'grupo', 'subgrupo', 'estado', 'subCentro', 'centroPrincipal_id'];
    columnastablas = [{
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.id}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.descripcion}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${(row.pre == 1 ? 'Si' : 'No')}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${(row.mov == 1 ? 'Si' : 'No')}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${(row.act == 1 ? 'Si' : 'No')}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.estado}`;
                return botones;
            }
        },
        
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `<a href="./ccCentros?i=${btoa(row.id)}" class="btn btn-outline-info rounded-pill">
            <i class="fa fa-pencil"></i>
            Editar
            </a>`;
                return botones;
            }
        },
    ];
</script>


<script type="text/javascript">
      function verSelect(valor){
        console.log(valor);
        if (valor==1) {
          document.getElementById('form-centro').style.display='Block';
        }else{
          document.getElementById('form-centro').style.display='none';
        }
      }
    </script>