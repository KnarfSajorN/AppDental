<!-- <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://hellomedical.net/blog?a=<?= salt() . base64_encode($rowNoticiaActual['id']) ?>"><i class="fab fa-facebook-square fa-4x"></i></a> -->

<?php
$url = $_GET['url'];
$tamano = $_GET['tamano'];
?>



<a title="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" target="_blank" class="btn text-white m-1" style="background-color: #306199;">
    <i class="fab fa-facebook-square fa-<?=$tamano?>x"></i>
</a>
<a title="linkedin" href="http://www.linkedin.com/shareArticle?url=<?= $url ?>" class="btn text-white m-1" style="background-color: #007bb6;">
    <i class="fab fa-linkedin fa-<?=$tamano?>x"></i>
</a>
<a title="twitter" href="https://twitter.com/intent/tweet?text=<?= $url ?>" class="btn text-white m-1" style="background-color: #26c4f1;">
    <i class="fab fa-twitter fa-<?=$tamano?>x"></i>
</a>
<a title="whatsapp" href="whatsapp://send?text=<?= $url ?>" class="btn text-white m-1" style="background-color: #43d854;">
    <i class="fab fa-whatsapp fa-<?=$tamano?>x"></i>
</a>
<a href="javascript:window.print()" class="btn text-white m-1" style="background-color: #717f8b;">
    <i class="fas fa-print fa-<?=$tamano?>x"></i>
</a>