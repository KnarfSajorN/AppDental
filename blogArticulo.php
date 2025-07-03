<?php
$idNoticia = rawurldecode($_GET['a']);

$queryNoticiaActual = "SELECT * FROM noticias where slug = '{$idNoticia}'";
$resultadoNoticiaActual = mysqli_query($connGlobal, $queryNoticiaActual);
$rowNoticiaActual = mysqli_fetch_array($resultadoNoticiaActual);


// tratar imagenes
$rowNoticiaActual['blog'] = str_replace('<img ', '<img class="img img-fluid img-responsive rounded-3 center text-center" ', $rowNoticiaActual['blog']);
?>

<style>
  @media print {
    body * {
      visibility: hidden;
    }
    #blog-post * {
      visibility: visible;
      top: 0;
      left: 0;
    }
  }
</style>


<h3 class="pb-4 mb-4 fst-italic border-bottom">
  <?= $rowNoticiaActual['editor']; ?>
</h3>

<article class="blog-post" id="blog-post">
  <h2 class="blog-post-title"><?= $rowNoticiaActual['titulo']; ?></h2>
  <p class="blog-post-meta"><?= $rowNoticiaActual['fecha']; ?></p>

  <p><?= $rowNoticiaActual['descripcion']; ?></p>
  <img class="img img-fluid img-responsive w-100 rounded-3" src="<?= $rowNoticiaActual['img']; ?>">
  <hr>
  <?= $rowNoticiaActual['blog']; ?>
  <hr>
  <h4>Compartir este artículo</h4>
  
  <?php $_GET['url'] = 'https://hellomedical.net/blog/'.rawurlencode($rowNoticiaActual['slug']); ?>
  <?php include 'botonesCompartir.php'; ?>
</article>
