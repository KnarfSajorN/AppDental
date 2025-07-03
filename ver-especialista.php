<?php
//recibir get
$direccionWeb = $_GET[0];

// especialista
$queryEspecialistas = "SELECT ca.*, u.ID_principal from c_catalogo ca
left join usuarios u on ca.idUsuario = u.ID
where 1=1
and ca.direccionWeb = '{$direccionWeb}'
";
$resultEspecialistas = mysqli_query($conn, $queryEspecialistas);
$rowEspecialistas = null;
if ($resultEspecialistas) {
    while ($row = mysqli_fetch_assoc($resultEspecialistas)) {
        $rowEspecialistas = $row;
    }
}

// galería de imágenes
$queryGaleria = "SELECT * from c_galeria where idCatalogo = '{$rowEspecialistas['id']}' order by rand();";
// var_dump($queryGaleria);
$resultGaleria = mysqli_query($conn, $queryGaleria);
$rowGaleria = null;
if ($resultGaleria) {
    while ($row = mysqli_fetch_assoc($resultGaleria)) {
        $rowGaleria[] = $row;
    }
}

// comentarios
$queryComentarios = "SELECT * from c_comentarios where idUsuario = '{$rowEspecialistas['idUsuario']}' order by id desc;";
$resultComentarios = mysqli_query($conn, $queryComentarios);
$rowComentarios = null;
if ($resultComentarios) {
    while ($row = mysqli_fetch_assoc($resultComentarios)) {
        $rowComentarios[] = $row;
    }
}
?>

<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 mb-5" style="background: linear-gradient(rgba(9, 30, 62, .85), rgba(9, 30, 62, .85)), url(https://app.dentalsoftplus.com/uploads/<?= $rowEspecialistas['ID_principal'] ?>/c_banner/<?= $rowEspecialistas['banner'] ?>) center center no-repeat;  background-size: cover; object-position: <?= ($rowEspecialistas['bannerPosition'] <> '' ? $rowEspecialistas['bannerPosition'] : 'top') ?>; object-fit: cover; width: 100%;">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn"><?= $rowEspecialistas['nombre'] ?></h1>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" style="min-height: 500px;">
                <!-- <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about.jpg" style="object-fit: cover;">
                </div> -->
                <div class="wow slideInUp" data-wow-delay="0.<?= $i + 2 ?>s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="https://app.dentalsoftplus.com/uploads/<?= $rowEspecialistas['ID_principal'] ?>/c_foto/<?= $rowEspecialistas['foto'] ?>" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <?php
                                $arrayRedes = [
                                    'f' => 'fab fa-facebook-f fw-normal',
                                    't' => 'fab fa-twitter fw-normal',
                                    'i' => 'fab fa-instagram fw-normal',
                                    'l' => 'fab fa-linkedin-in fw-normal',
                                    'y' => 'fab fa-youtube fw-normal',
                                ];

                                foreach ($arrayRedes as $key => $red) {
                                    if ($rowEspecialistas[$key] != '') {
                                        echo '<a class="btn btn-primary btn-square m-1" href="' . $rowEspecialistas[$key] . '" target="_blank"><i class="' . $red . '"></i></a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2"><?= $rowEspecialistas['nombre'] ?></h4>
                            <p class="text-primary mb-0"><?= $rowEspecialistas['categoria'] ?> | <?= $rowEspecialistas['categoria2'] ?></p>
                            <p class="text-primary mb-0"><i class="fas fa-map-marker-alt"></i> <?= funcionMaster($rowEspecialistas['ciudad'], 'id', 'name', 'paisesCiudades') ?>, <?= funcionMaster($rowEspecialistas['pais'], 'id', 'name', 'paises') ?></p>
                            <p class="text-primary mb-0"><?= $rowEspecialistas['direccion'] ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="section-title mb-4">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Información y contacto</h5>
                    <!-- <h1 class="display-5 mb-0"><?= $rowEspecialistas['descripcion'] ?></h1> -->
                </div>
                <h4 class="text-body fst-italic mb-4">"<?= $rowEspecialistas['descripcion'] ?>"</h4>
                <!-- <p class="mb-4"><?= $rowEspecialistas['descripcion'] ?></p> -->
                <div class="row g-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                        <?php if (!empty($rowEspecialistas['valorconsulta']) && $rowEspecialistas['valorconsulta'] != 0): ?>
                            <h5 class="mb-3">
                                <i class="fa fa-circle text-primary me-3"></i>
                                Valor de consulta: <strong class="text-primary"><?= number_format($rowEspecialistas['valorconsulta'], 2) ?></strong>
                            </h5>
                        <?php endif; ?> <h5 class="mb-3"><i class="fa fa-circle text-primary me-3"></i>Dirección: <strong class="text-primary"> <?= $rowEspecialistas['direccion'] ?> </strong> </h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                        <h5 class="mb-3"><i class="fa fa-circle text-primary me-3"></i>Teléfonos: <strong class="text-primary"> <?= $rowEspecialistas['telefonos'] ?> </strong> </h5>
                        <h5 class="mb-3"><i class="fa fa-circle text-primary me-3"></i>Años de experiencia: <strong class="text-primary"> <?= $rowEspecialistas['anosExperiencia'] ?> </strong> </h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                        <h5 class="mb-3"><i class="fa fa-circle text-primary me-3"></i>Idiomas: <strong class="text-primary"> <?= $rowEspecialistas['idiomas'] ?> </strong> </h5>
                        <h5 class="mb-3"><i class="fa fa-circle text-primary me-3"></i>Formas de pago: <strong class="text-primary"> <?= $rowEspecialistas['fpago'] ?> </strong> </h5>
                    </div>
                </div>
                <a href="<?= $Base ?>agendar-cita/<?= $direccionWeb ?>" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s"> <i class="far fa-calendar-alt"></i> Agendar Cita</a>


                <div class="col-md-12 mt-4">
                    <div class="card border-0">

                        <div class="card-body text-center text-md-start">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="acerca-tab" data-bs-toggle="tab" data-bs-target="#acerca" type="button" role="tab" aria-controls="acerca" aria-selected="true">Acerca de</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="servicios-tab" data-bs-toggle="tab" data-bs-target="#servicios" type="button" role="tab" aria-controls="servicios" aria-selected="false">Servicios y tratamientos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="formacion-tab" data-bs-toggle="tab" data-bs-target="#formacion" type="button" role="tab" aria-controls="formacion" aria-selected="false">Formación Académica</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="galeria-tab" data-bs-toggle="tab" data-bs-target="#galeria" type="button" role="tab" aria-controls="galeria" aria-selected="false">Galería</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="comentarios-tab" data-bs-toggle="tab" data-bs-target="#comentarios" type="button" role="tab" aria-controls="comentarios" aria-selected="false">Comentarios</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="acerca" role="tabpanel" aria-labelledby="acerca-tab">
                                    <br class="mt-2">
                                    <?= $rowEspecialistas['proySer'] ?>
                                </div>
                                <div class="tab-pane fade" id="servicios" role="tabpanel" aria-labelledby="servicios-tab">
                                    <br class="mt-2">
                                    <?= $rowEspecialistas['proySer2'] ?>
                                </div>
                                <div class="tab-pane fade" id="formacion" role="tabpanel" aria-labelledby="formacion-tab">
                                    <br class="mt-2">
                                    <?= $rowEspecialistas['proySer3'] ?>
                                </div>
                                <div class="tab-pane fade" id="galeria" role="tabpanel" aria-labelledby="galeria-tab">
                                    <br class="mt-2">

                                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators" style="top: 0;">
                                            <?php for ($i = 0; $i < count($rowGaleria); $i++) : ?>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?= ($i == 0 ? 'class="active" aria-current="true"' : '') ?> aria-label="Slide <?= $i + 1 ?>"></button>
                                            <?php endfor ?>
                                        </div>
                                        <div class="carousel-inner rounded-3">
                                            <?php for ($i = 0; $i < count($rowGaleria); $i++) : ?>
                                                <div class="carousel-item <?= ($i == 0 ? 'active' : '') ?> center text-center">
                                                    <img src="https://app.dentalsoftplus.com/uploads/<?= $rowEspecialistas['ID_principal'] ?>/c_galeria/<?= $rowGaleria[$i]['archivo'] ?>" class="" style="height:100%; width:auto; max-width:100%;">
                                                </div>
                                            <?php endfor ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="comentarios" role="tabpanel" aria-labelledby="comentarios-tab">
                                    <br class="mt-2">
                                    <a class="btn btn-primary" href="<?= $Base ?>comentarios/<?= $direccionWeb ?>">Dejar un Comentario</a>

                                    <div class="row mt-2">
                                        <?php for ($i = 0; $i < count($rowComentarios); $i++) : ?>
                                            <div class="p-1">
                                                <div class="card bg-light">
                                                    <div class="card-header text-muted">
                                                        <!-- Anónimo Dijo: -->
                                                        <?= $rowComentarios[$i]['fecha'] ?>, <strong><?= $rowComentarios[$i]['nombre'] ?></strong>:
                                                    </div>
                                                    <div class="card-body">
                                                        <blockquote class="blockquote mb-0">
                                                            <footer class="blockquote-footer"><?= utf8_decode(utf8_encode($rowComentarios[$i]['comentario'])) ?></footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor ?>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
<!-- About End -->