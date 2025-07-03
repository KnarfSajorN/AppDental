<?php require_once __DIR__ . '/../funciones/funciones.php'; ?>
<?php 
$cliente_id = decrypt($_GET['cI']);
$historiaClinica1 = decrypt($_GET['iC']);
$Tabla = "OBT_Imagenes";


?>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- cdn bootstrap 5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


</head>

<style>
    @media only screen and (max-width: 760px) {
        .col-md-6:nth-child(2) {
            margin-top: 130px;
        }
    }

    @-webkit-keyframes animation {
        from {
            opacity: 0;
            -webkit-transform: scale(1.2) rotateX(45deg);
            transform: scale(1.2) rotateX(45deg);
        }

        to {}
    }

    @-webkit-keyframes animation2 {
        from {
            opacity: 0;
            -webkit-transform: scale(1.2) rotateX(45deg);
            transform: scale(1.2) rotateX(45deg);
        }

        to {}
    }

    body * {
        cursor: url(https://dl.dropboxusercontent.com/u/50037593/ElasticSlider/images/cur.png), auto;
    }

    body {
        background: #1c1c1c;
        /*-webkit-perspective:1000px;*/
        overflow: auto;

        cursor: url(https://dl.dropboxusercontent.com/u/50037593/ElasticSlider/images/cur.png), auto;
    }

    @font-face {
        font-family: font;
        src: url(https://dl.dropboxusercontent.com/u/50037593/ElasticSlider/hand.ttf);
        font-weight: bold;
    }

    .slider div p {
        color: #1c1c1c;
        position: absolute;
        bottom: -65px;
        font-family: font;
        font-size: 22px;
    }

    .slider2 div p {
        color: #1c1c1c;
        position: absolute;
        bottom: -65px;
        font-family: font;
        font-size: 22px;
    }

    .slider3 div p {
        color: #1c1c1c;
        position: absolute;
        bottom: -65px;
        font-family: font;
        font-size: 22px;
    }

    .slider {

        -webkit-animation: animation ease 1s;
        animation-delay: .8s;
        animation-fill-mode: backwards;


        margin: 0;
        height: 360px;
        width: 240px;
        padding-top: 40px;
        top: 100px;

        perspective: 1000px;
        transition: ease-in-out .2s;
        /*-webkit-transform:rotateX(45deg);
             -webkit-transform-style:preserve-3d;
                 position:absolute;*/
    }

    .slider2 {

        -webkit-animation: animation ease 1s;
        animation-delay: .8s;
        animation-fill-mode: backwards;


        margin: 0;
        height: 360px;
        width: 240px;
        padding-top: 40px;
        top: 100px;

        perspective: 1000px;
        transition: ease-in-out .2s;
        /*-webkit-transform:rotateX(45deg);
             -webkit-transform-style:preserve-3d;
                 position:absolute;*/
    }

    .slider3 {

-webkit-animation: animation ease 1s;
animation-delay: .8s;
animation-fill-mode: backwards;


margin: 0;
height: 360px;
width: 240px;
padding-top: 40px;
top: 100px;

perspective: 1000px;
transition: ease-in-out .2s;
/*-webkit-transform:rotateX(45deg);
     -webkit-transform-style:preserve-3d;
         position:absolute;*/
}

    /*.slider:active{ -webkit-transform:rotateZ(10deg);}*/


    .slide img, .slide video, .slide strong p {
        text-align: center;
        width: 100%;
        height: 100%;
        -webkit-user-drag: none;
        user-drag: none;
        -moz-user-drag: none;
        border-radius: 2px;
    }


    .slide {



        -webkit-user-select: none;
        user-select: none;
        -moz-user-select: none;
        position: absolute;
        height: auto;
        width: 150%;

        box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.3);
        background: #fcfcfc;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        text-align: center;
        /*overflow:hidden;*/
        border: 12px white solid;
        box-sizing: border-box;
        border-bottom: 55px white solid;
        border-radius: 5px;



    }

    .transition {
        -webkit-transition: cubic-bezier(0, 1.95, .49, .73) .4s;
        -moz-transition: cubic-bezier(0, 1.95, .49, .73) .4s;
        transition: cubic-bezier(0, 1.95, .49, .73) .4s;
    }

    p{
        text-align: center;
    }


</style>

<body>

    <div class="row m-0 p-0">
        <?php $contador = 0 ?>
        <?php $consPosturaC = mysqli_query($conn3, "SELECT * from {$Tabla} where activo = '1' AND cliente_id = $cliente_id and categoria = 'Postura corporal' ".(!empty($historiaClinica1) ? "and id_historia = '$historiaClinica1'" : "")."") ?>
        <?php $countPosturaC = mysqli_num_rows($consPosturaC) ?>
        <?php $banderaPosturaC = (!empty($countPosturaC) ? true : false) ?>
        <?php $contador += (!empty($countPosturaC) ? 1 : 0) ?>

        <?php $consCara = mysqli_query($conn3, "SELECT * from {$Tabla} where activo = '1' AND cliente_id = $cliente_id and categoria = 'Fotos de cara' ".(!empty($historiaClinica1) ? "and id_historia = '$historiaClinica1'" : "")."") ?>
        <?php $countCara = mysqli_num_rows($consCara) ?>
        <?php $banderaCara = (!empty($countCara) ? true : false) ?>
        <?php $contador += (!empty($countCara) ? 1 : 0) ?>

        <?php $consBoca = mysqli_query($conn3, "SELECT * from {$Tabla} where activo = '1' AND cliente_id = $cliente_id and categoria = 'Fotos de boca' ".(!empty($historiaClinica1) ? "and id_historia = '$historiaClinica1'" : "")."") ?>
        <?php $countBoca = mysqli_num_rows($consBoca) ?>
        <?php $banderBoca = (!empty($countBoca) ? true : false) ?>
        <?php $contador += (!empty($countBoca) ? 1 : 0) ?>

        
        <?php $consModelos = mysqli_query($conn3, "SELECT * from {$Tabla} where activo = '1' AND cliente_id = $cliente_id and categoria = 'Fotos de modelos' ".(!empty($historiaClinica1) ? "and id_historia = '$historiaClinica1'" : "")."") ?>
        <?php $countModelos = mysqli_num_rows($consModelos) ?>
        <?php $banderaModelos = (!empty($countModelos) ? true : false) ?>
        <?php $contador += (!empty($countModelos) ? 1 : 0) ?>

        <?php
            $ancho_col = 0;
            switch ($contador) {
                case '1':
                    $ancho_col = 12;
                    break;
                case '2':
                    $ancho_col = 6;
                    break;
                case '3':
                    $ancho_col = 4;
                    break;
                case '4':
                    $ancho_col = 3;
                    break;
                
                default:
                    break;
            }
        
        ?>


        <div align="center" class="<?= ($banderaPosturaC == true ? "col-md-".$ancho_col."" : "d-none") ?>">
            <h2 class="center text-center text-white">Postura corporal</h2>
            <div style="margin-left:-7rem;" class="slider">
                <?php foreach ($consPosturaC as $datAntes) { ?>
                    <div class="slide">
                        <img src="<?=$Base?>Odontologia_bo1329/OBT_Images/<?= $cliente_id ?>/<?= $datAntes['img1'] ?>" />
                        <h3><?= $datAntes['titulo1'] ?></h3>
                        <p><?= $datAntes['sub_categoria'] ?><br><?= $datAntes['fechaRef'] ?></p>
                    </div>
                <?php } ?>
                <div class="slide">
                    <!-- <img src="logos/<?= funcionMaster(1, "ID_Usuario", "logoF", "config") ?>" /> -->
                    <h3>Imagenes de Postura corporal</h3>
                    <p><br></p>
                </div>
            </div>
        </div>

        <div align="center" class="<?= ($banderBoca == true ? "col-md-".$ancho_col."" : "d-none") ?>">
            <h2 class="center text-center text-white">Boca</h2>
            <div style="margin-left:-7rem;" class="slider3">
                <?php foreach ($consBoca as $datDurante) { ?>
                    <div class="slide">
                        <img src="<?=$Base?>Odontologia_bo1329/OBT_Images/<?= $cliente_id ?>/<?= $datDurante['img1'] ?>" />
                        <h3><?= $datDurante['titulo1'] ?></h3>
                        <p><?= $datDurante['sub_categoria'] ?><br><?= $datDurante['fechaRef'] ?></p>
                    </div>
                <?php } ?>
                <div class="slide">
                    <h3>Imágenes de Boca</h3>
                    <p><br></p>
                </div>
            </div>
        </div>


        <div align="center" class="<?= ($banderaCara == true ? "col-md-".$ancho_col."" : "d-none") ?>">
            <h2 class="center text-center text-white">Cara</h2>
            <div style="margin-left:-7rem;" class="slider2">
                <?php foreach ($consCara as $datDespues) { ?>
                    <div class="slide">
                        <img src="<?=$Base?>Odontologia_bo1329/OBT_Images/<?= $cliente_id ?>/<?= $datDespues['img1'] ?>" />
                        <h3><?= $datDespues['titulo1'] ?></h3>
                        <p><?= $datDespues['sub_categoria'] ?><br><?= $datDespues['fechaRef'] ?></p>
                    </div>
                <?php } ?>
                <div class="slide">
                    <h3>Imágenes de cara</h3>
                    <p><br></p>
                </div>
            </div>
        </div>

    
        <div align="center" class="<?= ($banderaModelos == true ? "col-md-".$ancho_col."" : "d-none") ?>">
            <h2 class="center text-center text-white">Modelos</h2>
            <div style="margin-left:-7rem;" class="slider2">
                <?php foreach ($consModelos as $datDespues) { ?>
                    <div class="slide">
                        <img src="<?=$Base?>Odontologia_bo1329/OBT_Images/<?= $cliente_id ?>/<?= $datDespues['img1'] ?>" />
                        <h3><?= $datDespues['titulo1'] ?></h3>
                        <p><?= $datDespues['sub_categoria'] ?><br><?= $datDespues['fechaRef'] ?></p>
                    </div>
                <?php } ?>
                <div class="slide">
                    <h3>Imágenes de Modelos</h3>
                    <p><br></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    /*! Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
     */

    window.addEventListener('load', onWndLoad, false);

    function onWndLoad() {

        var slider = document.querySelector('.slider');
        var sliders = slider.children;




        var initX = null;
        var transX = 0;
        var rotZ = 0;
        var transY = 0;

        var curSlide = null;

        var Z_DIS = 50;
        var Y_DIS = 10;
        var TRANS_DUR = 0.4;

        var images = document.querySelectorAll('img');
        for (var i = 0; i < images.length; i++) {
            images[i].onmousemove = function(e) {
                e.preventDefault()

            }
            images[i].ondragstart = function(e) {
                return false;

            }
        }

        function init() {

            var z = 0,
                y = 0;

            for (var i = sliders.length - 1; i >= 0; i--) {
                sliders[i].style.transform = 'translateZ(' + z + 'px) translateY(' + y + 'px)';

                z -= Z_DIS;
                y += Y_DIS;
            }


            attachEvents(sliders[sliders.length - 1]);



        }

        function attachEvents(elem) {
            curSlide = elem;

            curSlide.addEventListener('mousedown', slideMouseDown, false);
            curSlide.addEventListener('touchstart', slideMouseDown, false);
        }
        init();

        function slideMouseDown(e) {

            if (e.touches) {
                initX = e.touches[0].clientX;
            } else {
                initX = e.pageX;
            }


            document.addEventListener('mousemove', slideMouseMove, false);
            document.addEventListener('touchmove', slideMouseMove, false);

            document.addEventListener('mouseup', slideMouseUp, false);
            document.addEventListener('touchend', slideMouseUp, false);
        }
        var prevSlide = null;

        function slideMouseMove(e) {
            var mouseX;

            if (e.touches) {
                mouseX = e.touches[0].clientX;
            } else {
                mouseX = e.pageX;
            }

            transX += mouseX - initX;
            rotZ = transX / 20;

            transY = -Math.abs(transX / 15);



            curSlide.style.transition = 'none';
            curSlide.style.webkitTransform = 'translateX(' + transX + 'px)' + ' rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
            curSlide.style.transform = 'translateX(' + transX + 'px)' + ' rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
            var j = 1;
            //remains elements
            for (var i = sliders.length - 2; i >= 0; i--) {

                sliders[i].style.webkitTransform = 'translateX(' + transX / (2 * j) + 'px)' + ' rotateZ(' + rotZ / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                sliders[i].style.transform = 'translateX(' + transX / (2 * j) + 'px)' + ' rotateZ(' + rotZ / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                sliders[i].style.transition = 'none';
                j++;
            }



            initX = mouseX;
            e.preventDefault();
            if (Math.abs(transX) >= curSlide.offsetWidth - 30) {

                document.removeEventListener('mousemove', slideMouseMove, false);
                document.removeEventListener('touchmove', slideMouseMove, false);
                curSlide.style.transition = 'ease 0.2s';
                curSlide.style.opacity = 0;
                prevSlide = curSlide;
                attachEvents(sliders[sliders.length - 2]);
                slideMouseUp();
                setTimeout(function() {





                    slider.insertBefore(prevSlide, slider.firstChild);

                    prevSlide.style.transition = 'none';
                    prevSlide.style.opacity = '1';
                    slideMouseUp();

                }, 201);



                return;
            }
        }

        function slideMouseUp() {
            transX = 0;
            rotZ = 0;
            transY = 0;

            curSlide.style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR + 's';

            curSlide.style.webkitTransform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
            curSlide.style.transform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
            //remains elements
            var j = 1;
            for (var i = sliders.length - 2; i >= 0; i--) {
                sliders[i].style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR / (j + 0.9) + 's';
                sliders[i].style.webkitTransform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                sliders[i].style.transform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';

                j++;
            }

            document.removeEventListener('mousemove', slideMouseMove, false);
            document.removeEventListener('touchmove', slideMouseMove, false);

        }

        // lo mismo para slider2

        var slider2 = document.querySelector('.slider2');
        var sliders2 = slider2.children;

        var initX2 = null;
        var transX2 = 0;
        var rotZ2 = 0;
        var transY2 = 0;

        var curSlide2 = null;

        var Z_DIS2 = +50;
        var Y_DIS2 = +10;
        var TRANS_DUR2 = 0.4;

        var images2 = document.querySelectorAll('img');

        for (var i = images.length; i < images2.length; i++) {
            images2[i].onmousemove = function(e) {
                e.preventDefault()
            }
            images2[i].ondragstart = function(e) {
                return false;
            }
        }

        function init2() {
            var z2 = 0,
                y2 = 0;

            for (var i = sliders2.length - 1; i >= 0; i--) {
                sliders2[i].style.transform = 'translateZ(' + z2 + 'px) translateY(' + y2 + 'px)';
                z2 -= Z_DIS2;
                y2 += Y_DIS2;
            }

            attachEvents2(sliders2[sliders2.length - 1]);
        }

        function attachEvents2(elem) {
            curSlide2 = elem;

            curSlide2.addEventListener('mousedown', slideMouseDown2, false);
            curSlide2.addEventListener('touchstart', slideMouseDown2, false);
        }

        init2();

        function slideMouseDown2(e) {

            if (e.touches) {
                initX2 = e.touches[0].clientX;
            } else {
                initX2 = e.pageX;
            }


            document.addEventListener('mousemove', slideMouseMove2, false);
            document.addEventListener('touchmove', slideMouseMove2, false);

            document.addEventListener('mouseup', slideMouseUp2, false);
            document.addEventListener('touchend', slideMouseUp2, false);
        }
        var prevSlide2 = null;

        function slideMouseMove2(e) {
            var mouseX2;

            if (e.touches) {
                mouseX2 = e.touches[0].clientX;
            } else {
                mouseX2 = e.pageX;
            }

            transX2 += mouseX2 - initX2;
            rotZ2 = transX2 / 20;

            transY2 = -Math.abs(transX2 / 15);

            curSlide2.style.transition = 'none';
            curSlide2.style.webkitTransform = 'translateX(' + transX2 + 'px)' + ' rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + transY2 + 'px)';
            curSlide2.style.transform = 'translateX(' + transX2 + 'px)' + ' rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + transY2 + 'px)';
            var j = 1;
            //remains elements
            for (var i = sliders2.length - 2; i >= 0; i--) {

                sliders2[i].style.webkitTransform = 'translateX(' + transX2 / (2 * j) + 'px)' + ' rotateZ(' + rotZ2 / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS2 * j) + 'px)' + ' translateZ(' + (-Z_DIS2 * j) + 'px)';
                sliders2[i].style.transform = 'translateX(' + transX2 / (2 * j) + 'px)' + ' rotateZ(' + rotZ2 / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS2 * j) + 'px)' + ' translateZ(' + (-Z_DIS2 * j) + 'px)';
                sliders2[i].style.transition = 'none';
                j++;
            }



            initX2 = mouseX2;

            e.preventDefault();
            if (Math.abs(transX2) >= curSlide2.offsetWidth - 30) {

                document.removeEventListener('mousemove', slideMouseMove2, false);
                document.removeEventListener('touchmove', slideMouseMove2, false);
                curSlide2.style.transition = 'ease 0.2s';
                curSlide2.style.opacity = 0;
                prevSlide2 = curSlide2;
                attachEvents2(sliders2[sliders2.length - 2]);
                slideMouseUp2();
                setTimeout(function() {
                    slider2.insertBefore(prevSlide2, slider2.firstChild);

                    prevSlide2.style.transition = 'none';
                    prevSlide2.style.opacity = '1';
                    slideMouseUp2();
                }, 201);



                return;
            }
        }

        function slideMouseUp2() {
            transX2 = 0;
            rotZ2 = 0;
            transY2 = 0;

            curSlide2.style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR2 + 's';

            curSlide2.style.webkitTransform = 'translateX(' + transX2 + 'px)' + 'rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + transY2 + 'px)';
            curSlide2.style.transform = 'translateX(' + transX2 + 'px)' + 'rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + transY2 + 'px)';
            //remains elements
            var j = 1;
            for (var i = sliders2.length - 2; i >= 0; i--) {
                sliders2[i].style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR2 / (j + 0.9) + 's';
                sliders2[i].style.webkitTransform = 'translateX(' + transX2 + 'px)' + 'rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + (Y_DIS2 * j) + 'px)' + ' translateZ(' + (-Z_DIS2 * j) + 'px)';
                sliders2[i].style.transform = 'translateX(' + transX2 + 'px)' + 'rotateZ(' + rotZ2 + 'deg)' + ' translateY(' + (Y_DIS2 * j) + 'px)' + ' translateZ(' + (-Z_DIS2 * j) + 'px)';

                j++;
            }

            document.removeEventListener('mousemove', slideMouseMove2, false);
            document.removeEventListener('touchmove', slideMouseMove2, false);

        }




        // lo mismo para slider3

        var slider3 = document.querySelector('.slider3');
        var sliders3 = slider3.children;

        var initX3 = null;
        var transX3 = 0;
        var rotZ3 = 0;
        var transY3 = 0;

        var curSlide3 = null;

        var Z_DIS3 = +50;
        var Y_DIS3 = +10;
        var TRANS_DUR3 = 0.4;

        var images3 = document.querySelectorAll('img');

        for (var i = images.length; i < images3.length; i++) {
            images3[i].onmousemove = function(e) {
                e.preventDefault()
            }
            images3[i].ondragstart = function(e) {
                return false;
            }
        }

        function init3() {
            var z3 = 0,
                y3 = 0;

            for (var i = sliders3.length - 1; i >= 0; i--) {
                sliders3[i].style.transform = 'translateZ(' + z3 + 'px) translateY(' + y3 + 'px)';
                z3 -= Z_DIS3;
                y3 += Y_DIS3;
            }

            attachEvents3(sliders3[sliders3.length - 1]);
        }

        function attachEvents3(elem) {
            curSlide3 = elem;

            curSlide3.addEventListener('mousedown', slideMouseDown3, false);
            curSlide3.addEventListener('touchstart', slideMouseDown3, false);
        }

        init3();

        function slideMouseDown3(e) {

            if (e.touches) {
                initX3 = e.touches[0].clientX;
            } else {
                initX3 = e.pageX;
            }


            document.addEventListener('mousemove', slideMouseMove3, false);
            document.addEventListener('touchmove', slideMouseMove3, false);

            document.addEventListener('mouseup', slideMouseUp3, false);
            document.addEventListener('touchend', slideMouseUp3, false);
        }
        var prevSlide3 = null;

        function slideMouseMove3(e) {
            var mouseX3;

            if (e.touches) {
                mouseX3 = e.touches[0].clientX;
            } else {
                mouseX3 = e.pageX;
            }

            transX3 += mouseX3 - initX3;
            rotZ3 = transX3 / 20;

            transY3 = -Math.abs(transX3 / 15);

            curSlide3.style.transition = 'none';
            curSlide3.style.webkitTransform = 'translateX(' + transX3 + 'px)' + ' rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + transY3 + 'px)';
            curSlide3.style.transform = 'translateX(' + transX3 + 'px)' + ' rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + transY3 + 'px)';
            var j = 1;
            //remains elements
            for (var i = sliders3.length - 2; i >= 0; i--) {

                sliders3[i].style.webkitTransform = 'translateX(' + transX3 / (2 * j) + 'px)' + ' rotateZ(' + rotZ3 / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS3 * j) + 'px)' + ' translateZ(' + (-Z_DIS3 * j) + 'px)';
                sliders3[i].style.transform = 'translateX(' + transX3 / (2 * j) + 'px)' + ' rotateZ(' + rotZ3 / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS3 * j) + 'px)' + ' translateZ(' + (-Z_DIS3 * j) + 'px)';
                sliders3[i].style.transition = 'none';
                j++;
            }



            initX3 = mouseX3;

            e.preventDefault();
            if (Math.abs(transX3) >= curSlide3.offsetWidth - 30) {

                document.removeEventListener('mousemove', slideMouseMove3, false);
                document.removeEventListener('touchmove', slideMouseMove3, false);
                curSlide3.style.transition = 'ease 0.2s';
                curSlide3.style.opacity = 0;
                prevSlide3 = curSlide3;
                attachEvents3(sliders3[sliders3.length - 2]);
                slideMouseUp3();
                setTimeout(function() {
                    slider3.insertBefore(prevSlide3, slider3.firstChild);

                    prevSlide3.style.transition = 'none';
                    prevSlide3.style.opacity = '1';
                    slideMouseUp3();
                }, 201);



                return;
            }
        }

        function slideMouseUp3() {
            transX3 = 0;
            rotZ3 = 0;
            transY3 = 0;

            curSlide3.style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR3 + 's';

            curSlide3.style.webkitTransform = 'translateX(' + transX3 + 'px)' + 'rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + transY3 + 'px)';
            curSlide3.style.transform = 'translateX(' + transX3 + 'px)' + 'rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + transY3 + 'px)';
            //remains elements
            var j = 1;
            for (var i = sliders3.length - 2; i >= 0; i--) {
                sliders3[i].style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR3 / (j + 0.9) + 's';
                sliders3[i].style.webkitTransform = 'translateX(' + transX3 + 'px)' + 'rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + (Y_DIS3 * j) + 'px)' + ' translateZ(' + (-Z_DIS3 * j) + 'px)';
                sliders3[i].style.transform = 'translateX(' + transX3 + 'px)' + 'rotateZ(' + rotZ3 + 'deg)' + ' translateY(' + (Y_DIS3 * j) + 'px)' + ' translateZ(' + (-Z_DIS3 * j) + 'px)';

                j++;
            }

            document.removeEventListener('mousemove', slideMouseMove3, false);
            document.removeEventListener('touchmove', slideMouseMove3, false);

        }
        
    }


    
</script>