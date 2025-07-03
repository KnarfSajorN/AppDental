<?php 
session_start();
?>
<div class="col-md-12">
    <label for="">Filtros</label>
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree<?= $_GET['number'] ?>" aria-expanded="false" aria-controls="collapseThree<?= $_GET['number'] ?>" onclick="return false;">
                        Configurar filtros de cliente
                    </button>
                </h5>
            </div>
            <div id="collapseThree<?= $_GET['number'] ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <?php
                    $filtros = [
                        ['Rango de edades'],
                        ['Genero'],
                        ['País'],
                        ['Fecha de ultima consulta'],
                        ['Cantidad de citas'],
                        ['Cantidad de citas desde una fecha'],
                        ['Estado civil'],
                        ['Tipo de sangre'],
                        ['Es donante?'],
                        ['Entidad de salud'],
                    ];
                    ?>
                    <?php for ($i = 0; $i < count($filtros); $i++) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filtro<?= $_GET['number'] ?>_<?= $i ?>" value="1" name="filtroPre[<?= $i ?>]">
                            <label class="form-check-label" id="label_filtro<?= $_GET['number'] ?>_<?= $i ?>" for="filtro<?= $_GET['number'] ?>_<?= $i ?>" onclick="mostrarFiltro<?= $_GET['number'] ?>(<?= $i ?>)">
                                <?= $filtros[$i][0] ?>
                            </label>

                            <script>
                                function mostrarFiltro<?= $_GET['number'] ?>(id) {
                                    let input = document.querySelector("#filtro<?= $_GET['number'] ?>_" + id);
                                    // si esta checkeado
                                    if (input.checked) {
                                        document.querySelector(".filtro<?= $_GET['number'] ?>_" + id).style.display = "none";
                                    } else {
                                        document.querySelector(".filtro<?= $_GET['number'] ?>_" + id).style.display = "block";
                                    }
                                }

                                
                                    if ('<?= $_GET['number'] ?>' != '' && '<?= $row['filtroPre_' . $i] ?>' == '1') {
                                        // click al label
                                        function abrirEditar<?= $_GET['number'] ?>() {
                                            if (document.getElementById("filtro<?= $_GET['number'] ?>_<?= $i ?>").checked == true) {
                                                // nada
                                            }else{
                                                document.getElementById("label_filtro<?= $_GET['number'] ?>_<?= $i ?>").click();
                                            }
                                        }
                                    }
                                
                            </script>
                        </div>
                        <div class="filtro<?= $_GET['number'] ?>_<?= $i ?>" style="display: none">

                            <?php if ($filtros[$i][0] == 'Rango de edades') : ?>
                                <div class="form-group">
                                    <label for="">Desde</label>
                                    <input type="number" class="form-control input-lg" name="filtroR[<?= $i ?>][0]" min="1" value="<?=(explode('||',$row['filtroR_'.$i])[0] != '' ? explode('||',$row['filtroR_'.$i])[0] : 1)?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Hasta</label>
                                    <input type="number" class="form-control input-lg" name="filtroR[<?= $i ?>][1]" min="1" value="<?=(explode('||',$row['filtroR_'.$i])[1] != '' ? explode('||',$row['filtroR_'.$i])[1] : 50)?>">
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Genero') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" <?= ($row['filtroR_' . $i] == '0' ? 'selected' : '') ?>>Todos</option>
                                        <option value="M" <?= ($row['filtroR_' . $i] == 'M' ? 'selected' : '') ?>>Masculino</option>
                                        <option value="F" <?= ($row['filtroR_' . $i] == 'F' ? 'selected' : '') ?>>Femenino</option>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'País') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" <?= ($row['filtroR_' . $i] == '0' ? 'selected' : '') ?>>Todos</option>
                                        <?php
                                        $queryAja = "SELECT * from paises";
                                        $resultAja = mysqli_query($conn3, $queryAja);
                                        while ($rowAja = mysqli_fetch_array($resultAja)) {
                                            echo '<option value="' . $rowAja['id'] . '" ' . ($row['filtroR_' . $i] == $rowAja['id'] ? 'selected' : '') . ' >' . $rowAja['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Fecha de ultima consulta') : ?>
                                <small>tope de consulta desde la fecha hasta la actualidad</small>
                                <div class="form-group">
                                    <input type="date" class="form-control input-lg" name="filtroR[<?= $i ?>][0]" value="<?= ($row['filtroR_' . $i] != '' ? $row['filtroR_' . $i] : date('Y-m-01')) ?>">
                                </div>
                                <small class="text-danger">Este filtro aplica para la historia clínica general, si necesita modificarlo, por favor comuníquese con el departamento de soporte. <a href="soporte">Click aqui</a></small>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Cantidad de citas') : ?>
                                <small>Cantidad mínima de citas agendadas en el sistema</small>
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" name="filtroR[<?= $i ?>][0]" min="1" value="<?= ($row['filtroR_' . $i] != '' ? $row['filtroR_' . $i] : 2) ?>">
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Cantidad de citas desde una fecha') : ?>
                                <small>Cantidad mínima de citas agendadas en el sistema a partir de una fecha</small>
                                <div class="form-group">
                                    <input type="number" class="form-control input-lg" name="filtroR[<?= $i ?>][0]" min="1" value="<?= (explode('||', $row['filtroR_' . $i])[0] <> '' ? explode('||', $row['filtroR_' . $i])[0] : 2) ?>">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control input-lg" name="filtroR[<?= $i ?>][1]" value="<?= (explode('||', $row['filtroR_' . $i])[1] <> '' ? explode('||', $row['filtroR_' . $i])[1] : date('Y-m-01')) ?>">
                                </div>
                            <?php endif ?>


                            <?php if ($filtros[$i][0] == 'Estado civil') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" <?= ($row['filtroR_' . $i] == '0' ? 'selected' : '') ?>> Todos </option>
                                        <option value="Casado(a)" <?= ($row['filtroR_' . $i] == 'Casado(a)' ? 'selected' : '') ?>>Casado(a)</option>
                                        <option value="Soltero(a)" <?= ($row['filtroR_' . $i] == 'Soltero(a)' ? 'selected' : '') ?>>Soltero(a)</option>
                                        <option value="Viudo(a)" <?= ($row['filtroR_' . $i] == 'Viudo(a)' ? 'selected' : '') ?>>Viudo(a)</option>
                                        <option value="Menor de edad" <?= ($row['filtroR_' . $i] == 'Menor de edad' ? 'selected' : '') ?>>Menor de edad</option>
                                        <option value="Separado(a)" <?= ($row['filtroR_' . $i] == 'Separado(a)' ? 'selected' : '') ?>>Separado(a)</option>
                                        <option value="Union Libre" <?= ($row['filtroR_' . $i] == 'Union Libre' ? 'selected' : '') ?>>Unión Libre</option>
                                        <option value="Divorciada(o)" <?= ($row['filtroR_' . $i] == 'Divorciada(o)' ? 'selected' : '') ?>>Divorciada(o)</option>
                                        <option value="Otro(a)" <?= ($row['filtroR_' . $i] == 'Otro(a)' ? 'selected' : '') ?>>Otro(a)</option>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Tipo de sangre') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" <?= $row['filtroR_' . $i] == '0' ? 'selected' : '' ?>> Todos </option>
                                        <option value="O NEGATIVO" <?= $row['filtroR_' . $i] == 'O NEGATIVO' ? 'selected' : '' ?>>O NEGATIVO</option>
                                        <option value="O POSITIVO" <?= $row['filtroR_' . $i] == 'O POSITIVO' ? 'selected' : '' ?>>O POSITIVO</option>
                                        <option value="A NEGATIVO" <?= $row['filtroR_' . $i] == 'A NEGATIVO' ? 'selected' : '' ?>>A NEGATIVO</option>
                                        <option value="A POSITIVO" <?= $row['filtroR_' . $i] == 'A POSITIVO' ? 'selected' : '' ?>>A POSITIVO</option>
                                        <option value="B NEGATIVO" <?= $row['filtroR_' . $i] == 'B NEGATIVO' ? 'selected' : '' ?>>B NEGATIVO</option>
                                        <option value="B POSITIVO" <?= $row['filtroR_' . $i] == 'B POSITIVO' ? 'selected' : '' ?>>B POSITIVO</option>
                                        <option value="AB NEGATIVO" <?= $row['filtroR_' . $i] == 'AB NEGATIVO' ? 'selected' : '' ?>>AB NEGATIVO</option>
                                        <option value="AB POSITIVO" <?= $row['filtroR_' . $i] == 'AB POSITIVO' ? 'selected' : '' ?>>AB POSITIVO</option>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Es donante?') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" <?= ($row['filtroR_' . $i] == '0' ? 'selected' : '') ?>> Todos </option>
                                        <option value="Si" <?= ($row['filtroR_' . $i] == 'Si' ? 'selected' : '') ?>>Si</option>
                                        <option value="No" <?= ($row['filtroR_' . $i] == 'No' ? 'selected' : '') ?>>No</option>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($filtros[$i][0] == 'Entidad de salud') : ?>
                                <div class="form-group">
                                    <select class="form-control input-lg" name="filtroR[<?= $i ?>][0]">
                                        <option value="0" selected> Todos </option>
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM Rips_Entidades where ID_principal = '{$_SESSION['ID_principal']}'");
                                        while ($RowMotorizado = mysqli_fetch_array($queryList)) {
                                            $id = $RowMotorizado['id'];
                                            $Nombre = $RowMotorizado['Nombre'];
                                            echo "<option value='$id' " . ($row['filtroR_' . $i] == $id ? 'selected' : '') . "> $Nombre </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php endif ?>

                        </div>
                    <?php endfor ?>
                </div>
            </div>
        </div>
    </div>
</div>