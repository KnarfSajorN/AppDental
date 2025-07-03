<style>
    .switch {
        position: relative;
        width: 150px;
        height: 50px;
        text-align: center;
        background: #3c8dbc;
        transition: all 0.2s ease;
        border-radius: 25px;
    }

    .switch span {
        position: absolute;
        width: 20px;
        height: 4px;
        top: 50%;
        left: 50%;
        margin: -2px 0px 0px -4px;
        background: #fff;
        display: block;
        transform: rotate(-45deg);
        transition: all 0.2s ease;
    }

    .switch span:after {
        content: "";
        display: block;
        position: absolute;
        width: 4px;
        height: 12px;
        margin-top: -8px;
        background: #fff;
        transition: all 0.2s ease;
    }

    .toggle-radio {
        text-align: -webkit-center;
    }

    .toggle-radio>input[type=radio] {
        display: none;
    }

    .toggle-radio>.switch label {
        cursor: pointer;
        color: rgba(0, 0, 0, 0.2);
        width: 60px;
        line-height: 50px;
        transition: all 0.2s ease;
    }

    .toggle-radio>label[for~=Si] {
        position: absolute;
        left: 0px;
        height: 20px;
    }

    .toggle-radio>label[for~=No] {
        position: absolute;
        right: 0px;
    }

    .toggle-radio>input[data="No"]:checked~.switch {
        background: #eb4f37;
    }

    .toggle-radio>input[data="No"]:checked~.switch label[data=No] {
        color: white;
    }

    .toggle-radio>input[data="Si"]:checked~.switch label[data=Si] {
        color: #50df54c2;
    }


    .toggle-radio>input[data="No"]:checked~.switch span {
        background: #fff;
        margin-left: -8px;
    }

    .toggle-radio>input[data="No"]:checked~.switch span:after {
        background: #fff;
        height: 20px;
        margin-top: -8px;
        margin-left: 8px;
    }
</style>
<?php
$usuario_id = $_SESSION['ID'];
$campos = 'lt, mt, et, jt, vt, st, dt,ld, md, ed, jd, vd, sd, dd,lh, mh, eh, jh, vh, sh, dh, ldp, mdp, edp, jdp, vdp, sdp, ddp, lhp, mhp, ehp, jhp, vhp, shp, dhp';
$queryList = mysqli_query($conn3, "SELECT {$campos} FROM  config where ID_Usuario=$usuario_id limit 1");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    foreach ($rowMotorizado as $key => $value) {
        $contador++;
        $datos["$key"] = "$value";
        if ($contador <= 6) {
            $datosvacios["$key"] = "0";
        } else {
            $datosvacios["$key"] = "12:00";
        }
    }
}
$datos_json = json_encode($datos);
$datosvacios = json_encode($datosvacios);
?>
<script>
    window.onload = function() {
        var Arreglo = <?php echo $datos_json ?>;

        for (index in Arreglo) {
            if (document.getElementsByName("Horario[" + index + "]")[0] != undefined) {
                if (index == "lt" || index == "lt" || index == "mt" || index == "et" || index == "jt" || index == "vt" || index == "st" || index == "dt") {
                    if (Arreglo[index] == "1") {
                        document.getElementsByName("Horario[" + index + "]")[0].checked = "true";
                    } else {
                        document.getElementsByName("Horario[" + index + "]")[1].checked = "true";
                    }

                } else {

                    document.getElementsByName("Horario[" + index + "]")[0].value = Arreglo[index];
                    document.getElementsByName("Horario[" + index + "]")[0].onchange();
                }

            }
        }
    };
</script>

<div class="row">
<div class="col-12">

<div class="card ">
<div class="card-header">


</div>
<div class="card-body" >

    <div class="col-md-12">
                <div class="col-md-12">
                    <label>Sucursal</label>
                    
                    <select id="Sucursal" name="Sucursal_Horario" class="form-control select2" data-placeholder="Seleccione Sucursal" style="width: 100%;" onchange="HorarioSucursal(this.value)">
                        <option value="0">General</option>
                        <?php


                        $queryList = mysqli_query($conn3, "SELECT * FROM  sucursales where idUsuario = {$_SESSION['ID']}");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $id = $rowMotorizado['id'];
                            $descripcion   = $rowMotorizado['descripcion'];

                            echo "<option value='$id'> $descripcion </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12">
                        <hr>
                </div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style='text-align:center;'>Día</th>
                            <th scope="col" style='width: 10%;text-align:center;'>Día Laboral</th>
                            <th scope="col" style='text-align:center;'>Desde</th>
                            <th scope="col" style='text-align:center;'>Hasta</th>
                            <th scope="col" style='text-align:center;'>&nbsp;</th>
                            <th scope="col" style='text-align:center;'>Desde</th>
                            <th scope="col" style='text-align:center;'>Hasta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $NombreDia = ["Lunes", "Martes",  "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
                        $Laboral = ["lt", "mt", "et", "jt", "vt", "st", "dt"];
                        $InputsD1 = ["ld", "md", "ed", "jd", "vd", "sd", "dd"];
                        $InputsH1 = ["lh", "mh", "eh", "jh", "vh", "sh", "dh"];
                        $InputsD2 = ["ldp", "mdp", "edp", "jdp", "vdp", "sdp", "ddp"];
                        $InputsH2 = ["lhp", "mhp", "ehp", "jhp", "vhp", "shp", "dhp"];

                        foreach ($NombreDia as $key => $value) {
                            $contador++;
                            echo "<tr>
                        <th scope='row'>{$NombreDia[$key]}</th>
                        <td>
                        <div class='toggle-radio'>
                            <input type='radio' name='Horario[{$Laboral[$key]}]' id='Si_{$NombreDia[$key]}' data='Si' value='1'>
                            <input type='radio' name='Horario[{$Laboral[$key]}]' id='No_{$NombreDia[$key]}' data='No' value='0' checked>
                            <div class='switch'>
                                <label for='Si_{$NombreDia[$key]}' data='Si'>Si</label>
                                <label for='No_{$NombreDia[$key]}' data='No'>No</label>
                                <span></span>
                            </div>
                        </div>
                        </td>
                        <td><input type='time' required class='form-control input-lg'  name='Horario[{$InputsD1[$key]}]' onchange='';></td>
                        <td><input type='time' required class='form-control input-lg'  name='Horario[{$InputsH1[$key]}]' onchange='validateTime(this);'></td>";

                            echo "  <td>&nbsp;</td>
                        <td><input type='time' required class='form-control input-lg'  name='Horario[{$InputsD2[$key]}]' onchange='';></td>
                        <td><input type='time' required class='form-control input-lg'  name='Horario[{$InputsH2[$key]}]' onchange='validateTime(this);'></td>
                    </tr>";
                        }

                        ?>
                    </tbody>
                </table>

            </div>

</div>

<div class="card-footer" style="display: none;">
Horario
</div>

</div>

</div>
</div>

<script>
    function validateTime(input) {
        if (input.value === '00:00') {
            input.value = '23:59'; // Default value example
        }
        if (input.value === '00:00:00') {
            input.value = '23:59'; // Default value example
        }
    }
</script>

<script>
    function HorarioSucursal(valor) {
console.log(valor);
        $.ajax({
            type: "POST",
            url: "Ajax_Horario_Sistema.php",
            data: {
                sucursal: valor,
                usuario: "<?php echo $usuario_id; ?>"
            },
            success: function(response) {
                console.log(response);
                var Arreglo = JSON.parse(response);

                if (Arreglo == null) {
                    Arreglo = <?php echo $datosvacios ?>;
                }

                console.log(Arreglo);

                for (index in Arreglo) {
                    if (document.getElementsByName("Horario[" + index + "]")[0] != undefined) {
                        if (index == "lt" || index == "lt" || index == "mt" || index == "et" || index == "jt" || index == "vt" || index == "st" || index == "dt") {
                            if (Arreglo[index] == "1") {
                                document.getElementsByName("Horario[" + index + "]")[0].checked = "true";
                            } else {
                                document.getElementsByName("Horario[" + index + "]")[1].checked = "true";
                            }

                        } else {
                            document.getElementsByName("Horario[" + index + "]")[0].value = Arreglo[index];
                            document.getElementsByName("Horario[" + index + "]")[0].onchange();
                        }

                    }
                }


            }
        });
    }
</script>
<!--
CREATE TABLE `medicaso_ms_cl538`.`Horario_Sistema`
( `id` INT(11) NOT NULL AUTO_INCREMENT, `usuario_id` INT(11) NOT NULL ,
`sucursal_id` INT(11) NOT NULL ,
`fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,

`lt` int(11) NULL DEFAULT '0' COMMENT 'Lunes Es Dia Laboral ? 0:No Labora | 1: Si Laboral' ,
`mt` int(11) NULL DEFAULT '0' COMMENT 'Martes Es Dia Laboral ? 0:No Labora | 1: Si Laboral',
`et` int(11) NULL DEFAULT '0' COMMENT 'Miercoles Es Dia Laboral ? 0:No Labora | 1: Si Laboral',
`jt` int(11) NULL DEFAULT '0' COMMENT 'Jueves Es Dia Laboral ? 0:No Labora | 1: Si Laboral',
`vt` int(11) NULL DEFAULT '0' COMMENT 'Viernes Es Dia Laboral ? 0:No Labora | 1: Si Laboral',
`st` int(11) NULL DEFAULT '0' COMMENT 'Sabado Es Dia Laboral ? 0:No Labora | 1: Si Laboral',
`dt` int(11) NULL DEFAULT '0' COMMENT 'Domingo Es Dia Laboral ? 0:No Labora | 1: Si Laboral',


`ld` TIME NULL DEFAULT '00:00:00' COMMENT 'Lunes Desde #1' ,
`lh` TIME NULL DEFAULT '00:00:00' COMMENT 'Lunes Hasta #1' ,
`md` TIME NULL DEFAULT '00:00:00' COMMENT 'Martes Desde #1',
`mh` TIME NULL DEFAULT '00:00:00' COMMENT 'Martes Hasta #1',
`ed` TIME NULL DEFAULT '00:00:00' COMMENT 'Miercoles Desde #1',
`eh` TIME NULL DEFAULT '00:00:00' COMMENT 'Miercoles Hasta #1',
`jd` TIME NULL DEFAULT '00:00:00' COMMENT 'Jueves Desde #1',
`jh` TIME NULL DEFAULT '00:00:00' COMMENT 'Jueves Hasta #1',
`vd` TIME NULL DEFAULT '00:00:00' COMMENT 'Viernes Desde #1',
`vh` TIME NULL DEFAULT '00:00:00' COMMENT 'Viernes Hasta #1',
`sd` TIME NULL DEFAULT '00:00:00' COMMENT 'Sabado Desde #1',
`sh` TIME NULL DEFAULT '00:00:00' COMMENT 'Sabado Hasta #1',
`dd` TIME NULL DEFAULT '00:00:00' COMMENT 'Domingo Desde #1',
`dh` TIME NULL DEFAULT '00:00:00' COMMENT 'Domingo Hasta #1',

`ldp` TIME NULL DEFAULT '00:00:00' COMMENT 'Lunes Desde #2' ,
`lhp` TIME NULL DEFAULT '00:00:00' COMMENT 'Lunes Hasta #2' ,
`mdp` TIME NULL DEFAULT '00:00:00' COMMENT 'Martes Desde #2',
`mhp` TIME NULL DEFAULT '00:00:00' COMMENT 'Martes Hasta #2',
`edp` TIME NULL DEFAULT '00:00:00' COMMENT 'Miercoles Desde #2',
`ehp` TIME NULL DEFAULT '00:00:00' COMMENT 'Miercoles Hasta #2',
`jdp` TIME NULL DEFAULT '00:00:00' COMMENT 'Jueves Desde #2',
`jhp` TIME NULL DEFAULT '00:00:00' COMMENT 'Jueves Hasta #2',
`vdp` TIME NULL DEFAULT '00:00:00' COMMENT 'Viernes Desde #2',
`vhp` TIME NULL DEFAULT '00:00:00' COMMENT 'Viernes Hasta #2',
`sdp` TIME NULL DEFAULT '00:00:00' COMMENT 'Sabado Desde #2',
`shp` TIME NULL DEFAULT '00:00:00' COMMENT 'Sabado Hasta #2',
`ddp` TIME NULL DEFAULT '00:00:00' COMMENT 'Domingo Desde #2',
`dhp` TIME NULL DEFAULT '00:00:00' COMMENT 'Domingo Hasta #2',

PRIMARY KEY (`id`)) ENGINE = MyISAM;
-->