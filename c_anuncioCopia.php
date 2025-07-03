<?php
include 'header.php';
include 'menu.php';

// $queryCatalogo = "SELECT * FROM c_catalogo where idUsuario = '{$_SESSION['ID']}' limit 1";
// 

$catalogActivo = 1;
$idUsuario = $_SESSION['ID'];
$queryCatalogExist = mysqli_query($conn3, "SELECT idUsuario FROM c_catalogo WHERE idUsuario = $idUsuario");//verificamos si el usuario existe.
if ($queryCatalogExist && mysqli_num_rows($queryCatalogExist) > 0) {//si el usuario YA existe corremos la consulta normal.
    $resultCatalogo = mysqli_query($conn3, "SELECT * FROM c_catalogo WHERE idUsuario = $idUsuario LIMIT 1");
} else {
    $queryCatalogInsert = mysqli_query($conn3, "INSERT INTO c_catalogo(idUsuario,activo) VALUES ('$idUsuario','$catalogActivo')");//si el usuario NO EXISTE lo creamos.
    $resultCatalogo = mysqli_query($conn3, "SELECT * FROM c_catalogo WHERE idUsuario = $idUsuario LIMIT 1");
}
// $resultCatalogo = mysqli_query($conn3, $queryCatalogo);
$rowCatalogo = mysqli_fetch_array($resultCatalogo);
// datos pasarela de pagos

$queryPasarelaExist = mysqli_query($conn3, "SELECT idUsuario FROM c_pasarela WHERE idUsuario = $idUsuario");
if ($queryPasarelaExist && mysqli_num_rows($queryPasarelaExist) > 0) {
    $resultDatosPago = mysqli_query($conn3, "SELECT * FROM c_pasarela WHERE idUsuario = $idUsuario LIMIT 1");
} else {
    $queryPasarelaInsert = mysqli_query($conn3, "INSERT INTO c_pasarela(idUsuario) VALUES ('$idUsuario')");
    $resultDatosPago = mysqli_query($conn3, "SELECT * FROM c_pasarela WHERE idUsuario = $idUsuario LIMIT 1");
}

$queryVisitasExist = mysqli_query($conn3, "SELECT idCatalogo FROM c_visitas WHERE idCatalogo = '{$rowCatalogo['id']}'");
if ($queryVisitasExist && mysqli_num_rows($queryVisitasExist) > 0) {
    $resultVisitas = mysqli_query($conn3, "SELECT * from c_visitas where idCatalogo = '{$rowCatalogo['id']}'");
} else {
    $queryVisitasInsert = mysqli_query($conn3, "INSERT INTO c_visitas(idCatalogo) VALUES ('{$rowCatalogo['id']}')");
    $resultVisitas = mysqli_query($conn3, "SELECT * from c_visitas where idCatalogo = '{$rowCatalogo['id']}'");
}

$queryComentariosExist = mysqli_query($conn3, "SELECT idUsuario FROM c_comentarios WHERE idUsuario = $idUsuario");
if ($queryComentariosExist && mysqli_num_rows($queryComentariosExist) > 0) {
    $resultComentarios = mysqli_query($conn3, "SELECT * from c_comentarios where idUsuario = '{$_SESSION['ID']}'");
    
} else {
    $queryComentariosInsert = mysqli_query($conn3, "INSERT INTO c_comentarios(idUsuario) VALUES ('$idUsuario')");
    $resultComentarios = mysqli_query($conn3, "SELECT * from c_comentarios where idUsuario = '{$_SESSION['ID']}'");
}

// $queryDatosPago = "SELECT * from c_pasarela where idUsuario = '{$_SESSION['ID']}' limit 1";
// $resultDatosPago = mysqli_query($conn3, $queryDatosPago);
$rowDatosPago = null;
if ($resultDatosPago) {
    $rowDatosPago = mysqli_fetch_assoc($resultDatosPago);
}

// -----------------------------------------------------
// importante tener estas dos variables para el formulario automático
$tabla = "c_catalogo";
$idUpdate = $rowCatalogo['id'];
// -----------------------------------------------------


//  porcentaje
$porcentajeBase = 23; // cantidad de campos a evaluar
$porcentaje = 0; // los que se van a ir sumando
($rowCatalogo['nombre'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['descripcion'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['foto'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['valorconsulta'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['categoria2'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['categoria'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['ciudad'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['direccionWeb'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['titulo'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['proySer'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['direccion'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['whatsapp'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['telefonos'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['anosExperiencia'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['tiposConsultas'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['proySer2'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['proySer3'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['idiomas'] <> '' ? $porcentaje++ : $porcentaje);
// ($rowCatalogo['fpago'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['cp'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['cv'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['cd'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['pais'] <> '' ? $porcentaje++ : $porcentaje);
($rowCatalogo['emailCorporativo'] <> '' ? $porcentaje++ : $porcentaje);
$porcentaje = intval(($porcentaje / $porcentajeBase) * 100);







// visitas totales
// $queryVisitas = "SELECT * from c_visitas where idCatalogo = '{$rowCatalogo['id']}'";
// $resultVisitas = mysqli_query($conn3, $queryVisitas);
$rowVisitas = null;
if ($resultVisitas) {
    while ($row = mysqli_fetch_assoc($resultVisitas)) {
        $rowVisitas[] = $row;
    }
}

// visitas por país
$visitasTotalesPorPais = [];
foreach ($rowVisitas as $visita) {
    $visitasTotalesPorPais[$visita['pais']]++;
}
arsort($visitasTotalesPorPais);

// visitas últimos 7 días
$visitasUltimos7Dias = [];
for ($i = 7; $i >= 0; $i--) {
    $fechaValidar = date('Y-m-d', strtotime("-{$i} days"));
    $visitasUltimos7Dias[$fechaValidar] = 0;
    foreach ($rowVisitas as $visita) {
        if ($fechaValidar == substr($visita['fecha'], 0, 10)) {
            $visitasUltimos7Dias[$fechaValidar]++;
        }
    }
}

// calcular estrellas según comentarios
// $queryComentarios = "SELECT * from c_comentarios where idUsuario = '{$_SESSION['ID']}'";
// $resultComentarios = mysqli_query($conn3, $queryComentarios);




$rowComentarios = null;
if ($resultComentarios) {
    while ($row = mysqli_fetch_assoc($resultComentarios)) {
        $rowComentarios[] = $row;
    }
}

$estrellas = 0;
$countEstrellas = 0;
$sumEstrellas = 0;
foreach ($rowComentarios as $comentario) {
    $countEstrellas++;
    $sumEstrellas += $comentario['stars'];
}
if ($sumEstrellas > 0) {
    $sumEstrellas = $sumEstrellas / $countEstrellas;
    $estrellas = intval($sumEstrellas / $countEstrellas);
}



// $estrellas = calcularEstrellasDirectorio($rowCatalogo['id']);
// var_dump($estrellas);
// $comentarios = funcionMasterCatalogo($rowCatalogo['id'], 'idUsuario', 'count(id)', 'comentarios');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1 class="m-0">Configuración directorio médico</h1>
                </div><!-- /.col -->
                <div class="col-sm-2">
                    <ol class="breadcrumb float-sm-right">
                        <p><?= date('Y-m-d') ?></p>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php
                            $arrayMenu = [
                               // ['Nombre' => 'Resumen de mi Directorio', 'tab' => 'resumen'],
                                ['Nombre' => 'Información de contacto', 'tab' => 'info'],
                                ['Nombre' => 'Perfil y galería de imágenes', 'tab' => 'galeria'],
                                ['Nombre' => 'Estadísticas', 'tab' => 'stats'],
                                // ['Nombre' => 'Pasarela de pagos', 'tab' => 'pagos'],
                            ]
                            ?>
                            <ul class="nav nav-pills">
                                <?php for ($i = 0; $i < count($arrayMenu); $i++) : ?>
                                    <li class="nav-item"><a class="nav-link <?= ($i == 0) ? 'active' : '' ?>" href="#<?= $arrayMenu[$i]['tab'] ?>" data-toggle="tab"><?= $arrayMenu[$i]['Nombre'] ?></a></li>
                                <?php endfor ?>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <!-- resumen -->















                                <!-- 
                                <div class="tab-pane active" id="resumen">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                    <h3 class="card-title">Mi perfil</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="progress center text-center align-self-end">
                                                        <div class="progress-bar <?= ($porcentaje >= 80 ? 'bg-primary-gradient' : 'bg-secondary') ?>" role="progressbar" style="width: <?= $porcentaje ?>%;" aria-valuenow="<?= $porcentaje ?>" aria-valuemin="0" aria-valuemax="100">Perfil al <?= $porcentaje ?>% <?= ($porcentaje > 80 ? '😄' : '') ?></div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <small>Use los botones de "Información de contacto" y "Galería de imágenes" para completar su perfil</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body center text-center">
                                                    <a href="https://erp.dentalsoftplus.com/comentarios?m=<?= salt() . base64_encode($rowCatalogo['id']) ?>" title="<?= $estrellas ?> / 5 estrellas">
                                                        <?php
                                                        // imprimimos las estrellas de 1 a 5 con la cantidad de $estrellas en color y el resto gris
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $estrellas) {
                                                                echo '<i class="fas fa-star fa-2x text-primary"></i>';
                                                            } else {
                                                                echo '<i class="far fa-star fa-2x text-muted"></i>';
                                                            }
                                                        }
                                                        ?>
                                                        <br>
                                                        <small><?= $comentarios ?> comentarios</small>
                                                    </a>
                                                </div>
                                                <div class="card-footer">
                                                    <small>Puntuación según comentarios</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                    <h3 class="card-title">Visitas</h3>
                                                </div>
                                                <div class="card-body row">
                                                    <!-- <div class="col-md-2">
                                                        <h6>Totales por País</h6>
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <ul class="nav nav-pills flex-column">
                                                                    <?php foreach ($visitasTotalesPorPais as $key => $value) { ?>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link">
                                                                                <?= $key ?>
                                                                                <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                            </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <?php
/*
                                                        $arrayDatos = [];
                                                        foreach ($visitasUltimos7Dias as $key => $value) {
                                                            array_push($arrayDatos, [$key, $value]);
                                                        }
                                                        $_GET['n'] = 1;
                                                        $_GET['datos'] = json_encode($arrayDatos);
                                                        $_GET['tiempo'] = '500';
                                                        $_GET['nombre'] = 'Visitas en la ultima semana';
                                                        include 'generarGrafica.php';


*/


                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                -->










                                <!-- para hellomedical -->
                                <div class="tab-pane active" id="info">
                                    <form id="form-catalogo">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="direccionWeb">Nombre de tu web</label>
                                                    <small>https://dentalsoftplus.com/ver-especialista/<strong class="text-danger">minombre</strong> </small>
                                                    <input type="text" class="form-control" id="direccionWeb" placeholder="Nombre de tu web" name="datos[direccionWeb]" accept="text/html" minlength="1" maxlength="20" oninput="this.value = this.value.replace(/[^a-z]/g, '');" onchange="validarDireccionWeb(this.value,<?= $rowCatalogo['id'] ?>)" value="<?= ($rowCatalogo != null ? $rowCatalogo['direccionWeb'] : '') ?>">
                                                    <small class="form-text text-danger">(No se permiten espacios ni caracteres especiales, máximo 20 caracteres)</small>
                                                    <small id="mensajeNombre"></small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Nombre">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="datos[nombre]" value="<?= ($rowCatalogo != null ? $rowCatalogo['nombre'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="valorconsulta">Valor de consulta</label>
                                                    <input type="text" class="form-control" id="valorconsulta" placeholder="valorconsulta" name="datos[valorconsulta]" value="<?= ($rowCatalogo != null ? $rowCatalogo['valorconsulta'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pais">País</label>
                                                    <select name="datos[pais]" class="form-control select2 w-100" style="width:100%;" id="pais"></select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ciudad">Ciudad</label>
                                                    <select name="datos[ciudad]" class="form-control select2 w-100" style="width:100%;" id="ciudad"></select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categoria">Especialidad Primaria</label>
                                                    <input type="text" class="form-control" id="categoria" placeholder="Especialidad" name="datos[categoria]" value="<?= ($rowCatalogo != null ? $rowCatalogo['categoria'] : '') ?>">
                                                    <!-- <select name="datos[categoria]" class="form-control select2 w-100" style="width:100%;" id="categoria">
                                                    </select> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="categoria2">Especialidad Secundaria</label>
                                                    <input type="text" class="form-control" id="categoria2" placeholder="Especialidad" name="datos[categoria2]" value="<?= ($rowCatalogo != null ? $rowCatalogo['categoria2'] : '') ?>">
                                                    <!-- <select name="datos[categoria2]" class="form-control select2 w-100" style="width:100%;" id="categoria2">
                                                    </select> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="anosExperiencia">Años de experiencia</label>
                                                    <input type="number" class="form-control" id="anosExperiencia" placeholder="Años" name="datos[anosExperiencia]" min="1" value="<?= ($rowCatalogo != null ? $rowCatalogo['anosExperiencia'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefonos">Números de contacto</label>
                                                    <input type="text" class="form-control" id="telefonos" placeholder="Números de contacto" name="datos[telefonos]" value="<?= ($rowCatalogo != null ? $rowCatalogo['telefonos'] : '') ?>">
                                                    <small class="form-text text-muted">por favor separar por comas (,)</small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="whatsapp">Números de WhatsApp</label>
                                                    <input type="text" class="form-control" id="whatsapp" placeholder="Números de WhatsApp" name="datos[whatsapp]" value="<?= ($rowCatalogo != null ? $rowCatalogo['whatsapp'] : '') ?>">
                                                    <small class="form-text text-muted">por favor separar por comas (,)</small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idiomas">Idiomas</label>
                                                    <input type="text" class="form-control" id="idiomas" placeholder="Idiomas" name="datos[idiomas]" value="<?= ($rowCatalogo != null ? $rowCatalogo['idiomas'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fpago">Formas de pago</label>
                                                    <input type="text" class="form-control" id="fpago" placeholder="fpago" name="datos[fpago]" value="<?= ($rowCatalogo != null ? $rowCatalogo['fpago'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cp">Tipo de consulta</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="datos[cp]" id="cp" value="1" <?= ($rowCatalogo != null && $rowCatalogo['cp'] == 1 ? 'checked' : '') ?>>
                                                        <label for="cp" class="form-check-label">Presencial</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="datos[cv]" id="cv" value="1" <?= ($rowCatalogo != null && $rowCatalogo['cv'] == 1 ? 'checked' : '') ?>>
                                                        <label for="cv" class="form-check-label">Domiciliar</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="datos[cd]" id="cd" value="1" <?= ($rowCatalogo != null && $rowCatalogo['cd'] == 1 ? 'checked' : '') ?>>
                                                        <label for="cd" class="form-check-label">Virtual</label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="datos[direccion]" value="<?= ($rowCatalogo != null ? $rowCatalogo['direccion'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <h3>Redes Sociales</h3>
                                                <div class="form-group">
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" class="form-control" id="facebook" placeholder="https://www.facebook.com/medico" name="datos[f]" value="<?= ($rowCatalogo != null ? $rowCatalogo['f'] : '') ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Twitter">Twitter</label>
                                                    <input type="text" class="form-control" id="Twitter" placeholder="https://www.twitter.com/medico" name="datos[t]" value="<?= ($rowCatalogo != null ? $rowCatalogo['t'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Instagram">Instagram</label>
                                                    <input type="text" class="form-control" id="Instagram" placeholder="https://www.instagram.com/medico" name="datos[i]" value="<?= ($rowCatalogo != null ? $rowCatalogo['i'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Linkedin">Linkedin</label>
                                                    <input type="text" class="form-control" id="Linkedin" placeholder="https://www.linkedin.com/in/medico" name="datos[l]" value="<?= ($rowCatalogo != null ? $rowCatalogo['l'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Youtube">Youtube</label>
                                                    <input type="text" class="form-control" id="Youtube" placeholder="https://www.youtube.com/medico" name="datos[y]" value="<?= ($rowCatalogo != null ? $rowCatalogo['y'] : '') ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="proySer">Perfil profesional</label>
                                                    <textarea class="editorJR" name="datos[proySer]" id="proySer" cols="30" rows="10"><?= ($rowCatalogo != null ? $rowCatalogo['proySer'] : '') ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="proySer2">Servicios y tratamientos:</label>
                                                    <textarea class="editorJR" name="datos[proySer2]" id="proySer2" cols="30" rows="10"><?= ($rowCatalogo != null ? $rowCatalogo['proySer2'] : '') ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="proySer3">Formación Académica:</label>
                                                    <textarea class="editorJR" name="datos[proySer3]" id="proySer3" cols="30" rows="10"><?= ($rowCatalogo != null ? $rowCatalogo['proySer3'] : '') ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="idiomas">Estado del directorio</label>
                                                    <select name="datos[activo]" class="form-control select2 w-100" style="width:100%;" id="activo">
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div> -->

                                        <input type="hidden" name="datos[activo]" value="1">



                                        <button type="submit" class="btn btn-primary btn-block" onclick="$('#form-catalogo').automaticForm({type:<?= ($rowCatalogo != null ? 2 : 1) ?>,idUpdate:'<?= ($rowCatalogo != null ? $rowCatalogo['id'] : '') ?>',table:'c_catalogo',reload:'',page:''});">Guardar</button>
                                    </form>
                                </div>

                                <!-- para estadisticas -->
                                <div class="tab-pane" id="stats">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <h6>Visitas</h6>
                                            <?php
                                            $visitasTotales = count($rowVisitas);
                                            $visitasMes = 0;
                                            $visitasMesPasado = 0;
                                            foreach ($rowVisitas as $visita) {
                                                if (substr($visita['fecha'], 5, 2) == date('m')) {
                                                    $visitasMes++;
                                                }
                                                if (substr($visita['fecha'], 5, 2) == date('m') - 1) {
                                                    $visitasMesPasado++;
                                                }
                                            }
                                            $arrayVisitasTotales = [
                                                'Visitas totales' => $visitasTotales,
                                                'Visitas este mes' => $visitasMes,
                                                'Visitas mes pasado' => $visitasMesPasado
                                            ];
                                            ?>

                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <ul class="nav nav-pills flex-column">
                                                        <?php foreach ($arrayVisitasTotales as $key => $value) { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <?= $key ?>
                                                                    <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h6>Visitas por País</h6>
                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <ul class="nav nav-pills flex-column">
                                                        <?php foreach ($visitasTotalesPorPais as $key => $value) { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <?= $key ?>
                                                                    <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h6>Comentarios</h6>
                                            <?php
                                            $comentariosTotales = count($rowComentarios);
                                            $comentariosMes = 0;
                                            $comentariosMesPasado = 0;
                                            foreach ($rowComentarios as $comentario) {
                                                if (substr($comentario['fecha'], 5, 2) == date('m')) {
                                                    $comentariosMes++;
                                                }
                                                if (substr($comentario['fecha'], 5, 2) == date('m') - 1) {
                                                    $comentariosMesPasado++;
                                                }
                                            }
                                            $arrayVisitasTotales = [
                                                'Comentarios totales' => $comentariosTotales,
                                                'Comentarios este mes' => $comentariosMes,
                                                'Comentarios mes pasado' => $comentariosMesPasado
                                            ];
                                            ?>

                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <ul class="nav nav-pills flex-column">
                                                        <?php foreach ($arrayVisitasTotales as $key => $value) { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <?= $key ?>
                                                                    <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h6>Puntuaciones.</h6>
                                            <?php
                                            // $comentariosTotales = count($rowComentarios);
                                            // $comentariosMes = 0;
                                            // $comentariosMesPasado = 0;
                                            // foreach ($rowComentarios as $comentario) {
                                            //     if (substr($comentario['fecha'], 5, 2) == date('m')) {
                                            //         $comentariosMes++;
                                            //     }
                                            //     if (substr($comentario['fecha'], 5, 2) == date('m') - 1) {
                                            //         $comentariosMesPasado++;
                                            //     }
                                            // }
                                            // $arrayVisitasTotales = [
                                            //     'Comentarios totales' => $comentariosTotales,
                                            //     'Comentarios este mes' => $comentariosMes,
                                            //     'Comentarios mes pasado' => $comentariosMesPasado
                                            // ];
                                            $arrayEstrellas = [];
                                            for ($i = 1; $i <= 5; $i++) {
                                                $arrayEstrellas[$i] = 0;
                                                foreach ($rowComentarios as $comentario) {
                                                    if ($comentario['stars'] == $i) {
                                                        $arrayEstrellas[$i]++;
                                                    }
                                                }
                                            }
                                            ?>

                                            <div class="card">
                                                <div class="card-body p-0">
                                                    <ul class="nav nav-pills flex-column">
                                                        <?php foreach ($arrayEstrellas as $key => $value) { ?>
                                                            <li class="nav-item">
                                                                <a class="nav-link">
                                                                    <?php
                                                                    for ($s = 1; $s <= 5; $s++) {
                                                                        if ($s <= $key) {
                                                                            echo '<i class="fas fa-star text-primary"></i>';
                                                                        } else {
                                                                            echo '<i class="far fa-star text-muted"></i>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>









                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                    <h3 class="card-title">Mi perfil</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="progress center text-center align-self-end">
                                                        <div class="progress-bar <?= ($porcentaje >= 80 ? 'bg-primary-gradient' : 'bg-secondary') ?>" role="progressbar" style="width: <?= $porcentaje ?>%;" aria-valuenow="<?= $porcentaje ?>" aria-valuemin="0" aria-valuemax="100">Perfil al <?= $porcentaje ?>% <?= ($porcentaje > 80 ? '😄' : '') ?></div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <small>Use los botones de "Información de contacto" y "Galería de imágenes" para completar su perfil</small>
                                                </div>
                                            </div>
                                        </div>










                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-primary">
                                                    <h3 class="card-title">Visitas</h3>
                                                </div>
                                                <div class="card-body row">
                                                    <!-- <div class="col-md-2">
                                                        <h6>Totales por País</h6>
                                                        <div class="card">
                                                            <div class="card-body p-0">
                                                                <ul class="nav nav-pills flex-column">
                                                                    <?php foreach ($visitasTotalesPorPais as $key => $value) { ?>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link">
                                                                                <?= $key ?>
                                                                                <span class="badge bg-primary float-right"><?= $value ?></span>
                                                                            </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-12">
                                                        <?php

                                                        $arrayDatos = [];
                                                        foreach ($visitasUltimos7Dias as $key => $value) {
                                                            array_push($arrayDatos, [$key, $value]);
                                                        }
                                                        $_GET['n'] = 1;
                                                        $_GET['datos'] = json_encode($arrayDatos);
                                                        $_GET['tiempo'] = '500';
                                                        $_GET['nombre'] = 'Visitas en la ultima semana';
                                                        include 'generarGrafica.php';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>






                                    </div>
                                </div>

                                <!-- para pagos -->
                                <div class="tab-pane" id="pagos">
                                    <form id="pago-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nombre completo del beneficiario</label>
                                                    <input type="text" class="form-control" id="nombreBeneficiario" name="datos[nombreBeneficiario]" value="<?= $rowDatosPago['nombreBeneficiario'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">País</label>
                                                    <input type="text" class="form-control" id="pais" name="datos[pais]" value="<?= $rowDatosPago['pais'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nombre del banco</label>
                                                    <input type="text" class="form-control" id="nombreBanco" name="datos[nombreBanco]" value="<?= $rowDatosPago['nombreBanco'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Número de cuenta bancaria</label>
                                                    <input type="text" class="form-control" id="numeroCuenta" name="datos[numeroCuenta]" value="<?= $rowDatosPago['numeroCuenta'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tipo de cuenta</label>
                                                    <input type="text" class="form-control" id="numeroCuenta" name="datos[numeroCuenta]" value="<?= $rowDatosPago['numeroCuenta'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Código del banco</label>
                                                    <input type="text" class="form-control" id="codigoBanco" name="datos[codigoBanco]" value="<?= $rowDatosPago['codigoBanco'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Código IBAN (International Bank Account Number)</label>
                                                    <input type="text" class="form-control" id="IBAN" name="datos[IBAN]" value="<?= $rowDatosPago['IBAN'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Código SWIFT/BIC</label>
                                                    <input type="text" class="form-control" id="SWIFT" name="datos[SWIFT]" value="<?= $rowDatosPago['SWIFT'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Habilitar pasarela de pago</label>
                                                    <!-- <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="datos[habilitado]" id="habilitado" value="1" <?= ($rowDatosPago['habilitado'] == 1 ? 'checked' : '') ?>>
                                                            Habilitar pasarela de pago
                                                        </label>
                                                    </div> -->
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="datos[habilitado]" value="1" <?= ($rowDatosPago['habilitado'] == 1 ? 'checked' : '') ?>>
                                                            Si - Atado a comisión del usuario
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="datos[habilitado]" value="0" <?= ($rowDatosPago['habilitado'] == 0 ? 'checked' : '') ?>>
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="datos[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                                            <input type="hidden" name="datos[fechaRegistro]" value="<?= date('Y-m-d H:i:s') ?>">

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="$('#pago-form').automaticForm({type:<?= ($rowDatosPago != null ? 2 : 1) ?>,idUpdate:'<?= ($rowDatosPago != null ? $rowDatosPago['id'] : '') ?>',table:'c_pasarela', reload:'', page:''});">Guardar</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <!-- para pagos -->
                                <div class="tab-pane" id="galeria">

                                    <div class="card">
                                        <div class="card-header bg-primary"></div>
                                        <div class="card-body">
                                            <form id="form-galeria">
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="titulo">Foto de perfil</label>
                                                            <input type="file" class="form-control" id="foto" name="archivos[foto|c_foto]" style="display:none;">
                                                            <label for="foto">
                                                                <img src="<?= $Base ?>uploads/<?= $_SESSION['ID_principal'] ?>/c_foto/<?= $rowCatalogo['foto'] ?>" class="img img-responsive w-100 img-fluid img-thumbnail" style="width:100%; height:auto; border-radius:1rem;" alt="">
                                                                <small>Click a la foto para cambiar</small>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="titulo">Foto de Portada</label>
                                                            <input type="file" class="form-control" id="banner" name="archivos[banner|c_banner]" style="display:none;" accept="image/*">
                                                            <br>
                                                            <label for="banner" style="width: 100%;">
                                                                <img accept="image/*" src="<?= $Base ?>uploads/<?= $_SESSION['ID_principal'] ?>/c_banner/<?= $rowCatalogo['banner'] ?>" class="img img-responsive w-100 img-fluid img-thumbnail" style="border-radius:1rem; width: 100%; height: 150px; object-fit: cover; object-position: <?= $rowCatalogo['bannerPosition'] ?>; z-index: -1;" alt="" id="banner-img">
                                                                <small>Click a la foto para cambiar</small>
                                                            </label>

                                                            <label for="titulo">Posición de Portada</label>
                                                            <select name="datos[bannerPosition]" class="form-control select2 w-100" style="width:100%;" id="bannerPosition" onchange="cambiarBanner();">
                                                                <option value="top" <?= ($rowCatalogo['bannerPosition'] == 'top' ? 'selected' : '') ?>>Superior</option>
                                                                <option value="center" <?= ($rowCatalogo['bannerPosition'] == 'center' ? 'selected' : '') ?>>Centrado</option>
                                                                <option value="bottom" <?= ($rowCatalogo['bannerPosition'] == 'bottom' ? 'selected' : '') ?>>Inferior</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-block" onclick="$('#form-galeria').automaticForm({type:<?= ($rowCatalogo != null ? 2 : 1) ?>,idUpdate:'<?= ($rowCatalogo != null ? $rowCatalogo['id'] : '') ?>',table:'c_catalogo',reload:'',page:''});">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header bg-maroon"></div>
                                        <div class="card-body">
                                            <form id="form-archivos">
                                                <input type="hidden" name="datos[idCatalogo]" value="<?= $rowCatalogo['id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputFile">Subir Archivo</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="archivos[archivo|c_galeria]" accept="image/*" class="form-control" id="exampleInputFile" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="mt-3 btn btn-maroon bg-maroon btn-block" onclick="$('#form-archivos').automaticForm({type:1,idUpdate:'',table:'c_galeria',reload:'',page:'anuncio'});">Subir</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row d-flex">
                                                <?php
                                                $queryArchivos = "SELECT * from c_galeria where idCatalogo = '{$rowCatalogo['id']}' ;";
                                                $resultArchivos = mysqli_query($conn3, $queryArchivos);
                                                while ($rowArchivos = mysqli_fetch_assoc($resultArchivos)) {
                                                    $nombrearchivo = $rowArchivos['archivo'];
                                                    $previsualizar = false;
                                                ?>
                                                    <div class="col-6 col-md-2 p-1" style="align-self:center;">
                                                        <div class="m-2 border border-maroon rounded">
                                                            <div class="mx-auto align-items-center center text-center" style="width: 100px; height: 100px;">
                                                                <?php if (
                                                                    strpos($rowArchivos['archivo'], '.jpg') ||
                                                                    strpos($rowArchivos['archivo'], '.png') ||
                                                                    strpos($rowArchivos['archivo'], '.gif') ||
                                                                    strpos($rowArchivos['archivo'], '.jpeg')
                                                                ) {
                                                                    $previsualizar = 'img'; ?>
                                                                    <i class="fas fa-file-image fa-4x mt-3 text-primary"></i>
                                                                <?php } else if (strpos($rowArchivos['archivo'], '.docx')) {
                                                                    $previsualizar = 'doc'; ?>
                                                                    <i class="fas fa-file-word fa-4x mt-3 text-primary"></i>
                                                                <?php } else if (
                                                                    strpos($rowArchivos['archivo'], '.xlsx') ||
                                                                    strpos($rowArchivos['archivo'], '.xlsm') ||
                                                                    strpos($rowArchivos['archivo'], '.xlsb') ||
                                                                    strpos($rowArchivos['archivo'], '.xltx') ||
                                                                    strpos($rowArchivos['archivo'], '.csv') ||
                                                                    strpos($rowArchivos['archivo'], '.xls')
                                                                ) {
                                                                    $previsualizar = 'doc'; ?>
                                                                    <i class="fas fa-file-excel fa-4x mt-3 text-success"></i>
                                                                <?php } else if (strpos($rowArchivos['archivo'], '.pdf')) {
                                                                    $previsualizar = 'doc'; ?>
                                                                    <i class="fas fa-file-invoice fa-4x mt-3 text-danger"></i>
                                                                <?php } else {
                                                                    $previsualizar = 'other'; ?>
                                                                    <i class="fas fa-file fa-4x mt-3"></i>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="bg-maroon text-center px-2" style="min-height: 80px;">
                                                                <div class="overflow-auto" style="max-height: 50px; min-height: 50px;">
                                                                    <span class=" " style="font-size: 13px;"><?= $rowArchivos['archivo'] ?></span>
                                                                </div>
                                                                <div class="row py-2">
                                                                    <?php if ($previsualizar === 'doc') { ?>
                                                                        <div class="col-6 mx-auto">
                                                                            <a class="btn btn-sm btn-maroon text-white" href="<?= $Base ?>uploads/<?= $_SESSION['ID_principal'] ?>/c_galeria/<?= $rowArchivos['archivo'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                                                                        </div>
                                                                    <?php } elseif ($previsualizar === 'img') { ?>
                                                                        <div class="col-6 mx-auto">
                                                                            <a class="btn btn-sm btn-maroon text-white" href="<?= $Base ?>uploads/<?= $_SESSION['ID_principal'] ?>/c_galeria/<?= $rowArchivos['archivo'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <div class="col-6 mx-auto">
                                                                        <a download="<?= $rowArchivos['archivo'] ?>" class="btn btn-sm btn-maroon text-white" href="./c_galeria/<?= $rowArchivos['archivo'] ?>" target="_blank">
                                                                            <i class="fas fa-download"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- </a> -->
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php include 'footer.php'; ?>

<script>
    function cambiarBanner() {
        document.getElementById('banner-img').style.objectPosition = document.getElementById('bannerPosition').value;
    }
</script>

<script>
    // select master
    $(document).ready(function() {
        console.log('<?= $rowCatalogo['ciudad'] ?> | <?= $rowCatalogo['pais'] ?>');

        // pais
        $('#pais').selectMaster({
            where: '',
            campoValue: 'id',
            campoTexto: 'name',
            tabla: 'paises',
            selected: '<?= ($rowCatalogo != null ? $rowCatalogo['pais'] : '') ?>',
        });

        // ciudad
        $('#ciudad').selectMaster({
            where: '',
            campoValue: 'id',
            campoTexto: 'name',
            tabla: 'paisesCiudades',
            selected: '<?= ($rowCatalogo != null ? $rowCatalogo['ciudad'] : '') ?>',
        });

        // especialidad 1
        // $('#categoria').selectMaster({
        //     where: '',
        //     campoValue: 'id',
        //     campoTexto: 'descripcion',
        //     tabla: 'c_categoria',
        //     selected: '<?= ($rowCatalogo != null ? $rowCatalogo['categoria'] : '') ?>',
        // });

        // especialidad 2
        // $('#categoria2').selectMaster({
        //     where: '',
        //     campoValue: 'id',
        //     campoTexto: 'descripcion',
        //     tabla: 'c_categoria',
        //     selected: '<?= ($rowCatalogo != null ? $rowCatalogo['categoria2'] : '') ?>',
        // });
    });
</script>