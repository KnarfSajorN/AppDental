<?php
include 'header.php';

// recibir el get
$pais = $_GET['pais'];
$especialidad = $_GET['especialidad'];
$ciudad = $_GET['ciudad'];

?>



<section class="pt-1">
  <div class="bg-holder" style="background-image:url(<?= $root ?>assets/img/illustrations/article-bg.png);background-position:right center;background-size:auto;">
  </div>
  <!--/.bg-holder-->

  <div class="container-lg">
    <div class="bg-holder" style="background-image:url(<?= $root ?>assets/img/illustrations/dot-2.png);background-position:left top;background-size:initial;margin-top:120px;margin-left:-35px;">
    </div>
    <!--/.bg-holder-->
    <div class="row h-100 justify-content-center pt-8">

      <main class="container">
        <div class="p-4 p-md-5 rounded">
          <div class="col-md-8 px-0">
            <h2 class=" fst-italic">Entérate de las noticias mas recientes del sector salud.</h2>
            <!-- <hr class="mx-auto text-dark" style="height:2px;width:auto" /> -->
          </div>
        </div>

        <div class="row g-5">
          <div class="col-md-8">
            <?php
            if ($_GET['a'] != '') {
              $_GET['a'] = $_GET['a'];
              include 'blogArticulo.php';
            } else {
              // nada 
              //  echo '<div class="alert alert-danger bg-light" role="alert">
              //     No ha seleccionado ninguna noticia.
              //   </div>';              
            ?>
              <div class="row h-100 justify-content-center">
                <?php
                $queryNoticiasRandom3 = "SELECT * from noticias where activo = 1 ORDER BY rand() LIMIT 10";
                $resultadoNoticiasRandom3 = mysqli_query($connGlobal, $queryNoticiasRandom3);
                $arrayNoticias3;
                while ($noticia3 = mysqli_fetch_assoc($resultadoNoticiasRandom3)) {
                  $arrayNoticias3[] = $noticia3;
                }
                ?>


                <?php for ($i = 0; $i < count($arrayNoticias3); $i++) : ?>
                  <div class="col-12">
                    <div class="card h-100 rounded-3 border-0 "><img src="assets/img/gallery/article-1.png" alt="" />
                      <div class="row card-body p-4 text-center text-md-start">
                        <div class="col-md-4">
                          <img class="rounded-3" src="<?=$arrayNoticias3[$i]['img']?>" style="width:100%; height:auto;" alt="">
                        </div>
                        <div class="col-md-8">
                        <h5 class="fw-bold"><?= $arrayNoticias3[$i]['titulo'] ?></h5>
                        <p class="card-text"><?= substr($arrayNoticias3[$i]['descripcion'], 0, 100) ?></p><a class="stretched-link text-decoration-none" href="./blog/<?= rawurlencode($arrayNoticias3[$i]['slug'])  ?>" role="button">Ver
                          <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                          </svg></a>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                <?php endfor ?>
                </div>
              <?php
            }
              ?>
              </div>

              <div class="col-md-4">
                <div class="position-sticky" style="top: 5rem;">
                  <!-- <div class="p-4 mb-3 bg-light rounded">
                <h4 class="fst-italic">Busqueda</h4>
                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
              </div> -->

                  <div class="p-4">
                    <h4 class="fst-italic">Ultimas Noticias</h4>
                    <?php
                    $queryNoticiasRandom2 = "SELECT * FROM noticias where activo = 1 ORDER BY id desc LIMIT 10";
                    $resultadoNoticiasRandom2 = mysqli_query($connGlobal, $queryNoticiasRandom2);
                    $arrayNoticias2;
                    while ($noticia2 = mysqli_fetch_assoc($resultadoNoticiasRandom2)) {
                      $arrayNoticias2[] = $noticia2;
                    }
                    ?>
                    <ul class="list-unstyled mb-0">
                      <?php for ($i = 0; $i < count($arrayNoticias2); $i++) : ?>
                        <li><a href="/blog/<?= rawurlencode($arrayNoticias2[$i]['slug'])?>"><?= $arrayNoticias2[$i]['titulo'] ?></a></li>
                        <hr>
                      <?php endfor ?>
                    </ul>
                  </div>

                  <!-- <div class="p-4">
                <h4 class="fst-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                  <li><a href="#">GitHub</a></li>
                  <li><a href="#">Twitter</a></li>
                  <li><a href="#">Facebook</a></li>
                </ol>
              </div> -->
                </div>
              </div>
          </div>

          <div class="row flex-center mt-5">
            <div class="col-auto text-center">
              <h2 class="fw-bold">Otras noticias</h2>
              <hr class="mx-auto text-dark" style="height:2px;width:50px" />
            </div>
          </div>

          <div class="row">
            <?php
            $queryNoticiasRandom = "SELECT * FROM noticias where activo = 1 ORDER BY RAND() LIMIT 3";
            $resultadoNoticiasRandom = mysqli_query($connGlobal, $queryNoticiasRandom);
            $arrayNoticias;
            while ($noticia = mysqli_fetch_assoc($resultadoNoticiasRandom)) {
              $arrayNoticias[] = $noticia;
            }
            ?>

            <?php for ($i = 0; $i < count($arrayNoticias); $i++) : ?>
              <div class="col-md-4">
                <div class="card h-100 rounded-3 shadow"><img src="assets/img/gallery/article-1.png" alt="" />
                  <div class="card-body p-4 text-center text-md-start">
                  <img class="img img-responsive w-100 mb-2 rounded-3" src="<?=$arrayNoticias[$i]['img']?>" alt="">
                    <h5 class="fw-bold"><?= $arrayNoticias[$i]['titulo'] ?></h5>
                    <p class="card-text"><?= substr($arrayNoticias[$i]['descripcion'], 0, 100) ?></p><a class="stretched-link text-decoration-none" href="/blog/<?= rawurlencode($arrayNoticias[$i]['slug'])  ?>" role="button">Ver
                      <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                      </svg></a>
                  </div>
                </div>
              </div>
            <?php endfor ?>
          </div>

      </main>

    </div>
  </div>

</section>
<?php
include 'footer.php';
?>