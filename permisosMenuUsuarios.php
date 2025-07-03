<?php
include 'header.php';
include 'menu.php';

if (!isset($_GET['idU'])) {
    echo "<script>window.location.href='$base/usuarios';</script>";
} else {
    $idU = decrypt($_GET['idU']);
}

$page = 'permisosUsuariosVista.php';

?>

<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <label for="">Permisos del Menu Usuario</label>
                                </div>

                            </div>
                           
                            <div class="card-body">
                                <div class="table table responsive">
                                    <table class="table table-striped" id="TablaRoles" style="width:100%">

                                        <thead>
                                            <tr>
                                                <td class="text-center">#</td>
                                                <td class="text-center">Usuario</td>
                                                <td class="text-center">Contraseña</td>
                                                <td class="text-center">Nombre</td>
                                                <td class="text-center">Tipo de Usuario</td>
                                                <td class="text-center">Teléfono</td>
                                                <td class="text-center">Especialidad</td>
                                                <td class="text-center" style="width:20% !important;">Permisos del Menu</td>
                                                <td class="text-center"> Acciones</td>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $queryUsuario12 = mysqli_query($conn3, "SELECT * FROM usuarios where ACTIVO = 1 and ID = $idU");
                                            $contador = 1;
                                            while ($row = mysqli_fetch_assoc($queryUsuario12)) {

                                                $id = $row['ID'];
                                                $usuario = $row['USUARIO'];
                                                $contrasena = $row['PASS'];
                                                $nombre = $row['NOMBRE_USUARIO'];
                                                $tipo5 = $row['TIPO'];
                                                $tel = $row['telefono'];
                                                $especialidad = $row['especialidad'];
                                                $menuUser = $row['menu'];
                                                $permisos = $row['permisos'];
                                                if (strlen($permisos) > 3) {
                                                    $permisos = explode("|/|", $permisos);
                                                    $permisos = array_map('intval', $permisos);
                                                } else {
                                                    $permisos = intval($permisos);
                                                }

                                                $queryMenuPerfil = mysqli_query($conn3, "SELECT * FROM grupos where estado = 1 and id = $menuUser");
                                                $rowMenu = mysqli_fetch_assoc($queryMenuPerfil);
                                                $arrayArreglo = $rowMenu['Arreglo_Grupos'];
                                                $arrayArreglo = json_decode($arrayArreglo, true);
                                                $arrayArreglo = array_map('intval', $arrayArreglo);

                                                // var_dump($arrayArreglo);



                                                echo "<tr>";
                                                echo "<td class='text-center'>" . $contador . "</td>";
                                                echo "<td class='text-center'>" . $usuario . "</td>";
                                                echo "<td class='text-center'>" . $contrasena . "</td>";
                                                echo "<td class='text-center'>" . $nombre . "</td>";
                                                echo "<td class='text-center'>" . $tipo5 . "</td>";
                                                echo "<td class='text-center'>" . $tel . "</td>";
                                                echo "<td class='text-center'>" . $especialidad . "</td>";
                                                echo "<td class='text-center'>"; ?>
                                                <form  id="formPermisos">
                                                    <select name="datos[permisos][]" id="mySelect" class="form-control multiple select2" data-placeholder="Seleccione..." multiple style="width: 100%;">
                                                       
                                                        <?php
                                                        foreach ($arrayArreglo as $key => $value) {
                                                            $selected = is_array($permisos) ? (in_array($value, $permisos) ? 'selected' : '') : ($value == $permisos ? 'selected' : '');
                                                            $menu = funcionMaster($value, 'id', 'Nombre_Grupo', 'Grupos_Menu');
                                                            echo "<option value='" . $value . "' " . $selected . ">" . $menu . "</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                   
                                                    <?php echo "</td>";
                                                    
                                                                echo "<td>"; ?>

                                                                        <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#formPermisos').automaticForm({type:2, table:'usuarios',idUpdate:'<?= $id ?>',reload:'',page:'<?= $page ?>'});">
                                                                            <i class="fa fa-save mr-1"></i>
                                                                            Guardar
                                                                        </button>
                                                    </form>
                                                    <?php echo "</td>"; ?>
                                                
                                            <?php
                                                echo "</tr>";
                                                $contador++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer">

                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'footer.php'; ?>
<!-- <script>
    function cambiarPermisos() {
        let menu = <?= $menu ?>;
        document.getElementById(`permisos`).innerHTML = `            
                <select class="form-group" name="datos[permisos]" multiple data-placeholder="Seleccione..." style="width: 100%;" id="permisosSelect">
                    </select>
            `;
        $.ajax({
            url: 'ajax_tiposmenu.php',
            method: 'POST',
            data: {
                menu: menu
            },
            success: function(respuesta) {
                console.log(respuesta);
                var objetoRespuesta = JSON.parse(respuesta);
                Object.keys(objetoRespuesta).forEach(function(id) {
                    // Agregamos la opción al select correspondiente
                    const select = document.getElementById('permisosSelect');
                    const option = new Option(`${objetoRespuesta[id]}`, id);
                    select.appendChild(option);

                });

            }
        });
        const select = document.getElementById('permisosSelect');
        select.classList.add('select2');
        select.classList.add('multiple');

    }

    window.addEventListener('DOMContentLoaded', function() {
        cambiarPermisos();
    });
</script> -->