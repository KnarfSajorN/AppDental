<?php
session_start();
$idUsuario = $_SESSION['ID'];

include '../funciones/conn3.php';

include 'funciones/funciones.php';

?>
<?php

$direccionWeb = $_GET['n'];
$id = $_GET['i'];




$date = date("Y-m-d");

// obtener pais del visitante
$ip = $_SERVER['REMOTE_ADDR'];
$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
$country = $ipdat->geoplugin_countryName;
$city = $ipdat->geoplugin_city;

// insertamos la visita y el log en visitas diarias para las metricas
mysqli_query($conn3, "UPDATE c_catalogo set vistas = $vistas where direccionWeb = '$direccionWeb'");
mysqli_query($conn3, "INSERT INTO  c_vistasDiarias (fecha, idUsuario, country, ip, city) values ('$date','$idUsuario','$country','$ip','$city')");


$queryList = mysqli_query($conn3, "SELECT * FROM c_catalogo where direccionWeb = '$direccionWeb'");
echo "SELECT * FROM c_catalogo where direccionWeb = '$direccionWeb'";

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {

     $nombre         = $rowMotorizado['nombre'];
     $descripcion    = $rowMotorizado['descripcion'];
     $foto           = $rowMotorizado['foto'];
     $valorconsulta  = $rowMotorizado['valorconsulta'];
     $profesion      = $rowMotorizado['profesion'];
     $categoria      = $rowMotorizado['categoria'];
     $pais           = $rowMotorizado['pais'];

     $idUsuarioDoctor      = $rowMotorizado['idUsuario'];


     $direccionWeb      = $rowMotorizado['direccionWeb'];


     $nombre         = $rowMotorizado['nombre'];
     $descripcion    = $rowMotorizado['descripcion'];
     $valorconsulta  = $rowMotorizado['valorconsulta'];
     $profesion      = $rowMotorizado['profesion'];
     $categoria      = $rowMotorizado['categoria'];
     $categoria2     = $rowMotorizado['categoria2'];
     $ciudad         = $rowMotorizado['ciudad'];
     $activo         = $rowMotorizado['activo'];
     $foto           = $rowMotorizado['foto'];

     $foto2           = $rowMotorizado['foto2'];
     $foto3           = $rowMotorizado['foto3'];
     $foto4           = $rowMotorizado['foto4'];
     $foto5           = $rowMotorizado['foto5'];

     $primario           = $rowMotorizado['primario'];
     $secundario           = $rowMotorizado['secundario'];
     $banner           = $rowMotorizado['banner'];




     $direccionWeb           = $rowMotorizado['direccionWeb'];
     $titulo           = $rowMotorizado['titulo'];
     $proySer           = $rowMotorizado['proySer'];


     $proySer2           = $rowMotorizado['proySer2'];
     $proySer3           = $rowMotorizado['proySer3'];
     $idiomas            = $rowMotorizado['idiomas'];
     $fpago              = $rowMotorizado['fpago'];


     $direccion           = $rowMotorizado['direccion'];
     $whatsapp           = $rowMotorizado['whatsapp'];
     $f           = $rowMotorizado['f'];
     $t           = $rowMotorizado['t'];
     $i           = $rowMotorizado['i'];
     $l           = $rowMotorizado['l'];
     $y           = $rowMotorizado['y'];
     $telefonos           = $rowMotorizado['telefonos'];
     $anosExperiencia           = $rowMotorizado['anosExperiencia'];

     $s1           = $rowMotorizado['s1'];
     $s2           = $rowMotorizado['s2'];
     $s3           = $rowMotorizado['s3'];
     $s4           = $rowMotorizado['s4'];
     $s5           = $rowMotorizado['s5'];
     $s6           = $rowMotorizado['s6'];
     $s7           = $rowMotorizado['s7'];
     $s8           = $rowMotorizado['s8'];
     $s9           = $rowMotorizado['s9'];
     $s10           = $rowMotorizado['s10'];
     $s11           = $rowMotorizado['s11'];
     $s12           = $rowMotorizado['s12'];
     $s13           = $rowMotorizado['s13'];
     $s14           = $rowMotorizado['s14'];

     $e1           = $rowMotorizado['e1'];
     $e2           = $rowMotorizado['e2'];
     $e3           = $rowMotorizado['e3'];
     $e4           = $rowMotorizado['e4'];
     $e5           = $rowMotorizado['e5'];
     $e6           = $rowMotorizado['e6'];
     $e7           = $rowMotorizado['e7'];
     $e8           = $rowMotorizado['e8'];
     $e9           = $rowMotorizado['e9'];
     $e10           = $rowMotorizado['e10'];
     $e11           = $rowMotorizado['e11'];
     $e12           = $rowMotorizado['e12'];
     $e13           = $rowMotorizado['e13'];
     $e14           = $rowMotorizado['e14'];
     $tiposConsultas = $rowMotorizado['tiposConsultas'];






     $cp           = $rowMotorizado['cp'];
     $cv           = $rowMotorizado['cv'];
     $cd           = $rowMotorizado['cd'];
     $ss           = $rowMotorizado['ss'];
     $particular   = $rowMotorizado['particular'];
}




$queryList2 = mysqli_query($conn3, "SELECT * FROM usuarios where ID = '$idUsuarioDoctor'");
echo "SELECT * FROM usuarios where ID = '$idUsuarioDoctor'";

$nrowl = mysqli_num_rows($queryList2);

while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {

     $activoDoctor         = $rowMotorizado2['ACTIVO'];
     $fechaDemo         = $rowMotorizado2['fechaDemo'];
     $USUARIO         = $rowMotorizado2['USUARIO'];
}



if (strlen($f) > 1) {
     $faceboock =  '<font size="6"> <li><a class="facebook" href="' . $f . '"><i class="lni-facebook"></i></a></li></font>';
} else {
     $faceboock = '';
}



if (strlen($t) > 1) {
     $twitter =  '<font size="6"><li><a class="twitter" href="' . $t . '"><i class="lni-twitter"></i></a></li></font>';
} else {
     $twitter = '';
}




if (strlen($i) > 1) {
     $instagram =  '<font size="6"><li><a class="instagram" href="' . $i . '"><i class="lni-instagram"></i></a></li></font>';
} else {
     $instagram = '';
}


if (strlen($l) > 1) {
     $linkedin =  '<font size="6"><li><a class="linkedin" href="' . $l . '"><i class="lni-linkedin"></i></a></li></font>';
} else {
     $linkedin = '';
}




if (strlen($y) > 1) {
     $youtube =  '<font size="6"><li><a class="youtube" href="' . $y . '">  <img src="https://medicalsoftplus.com/baseDev/Emma/youtube.png"  height="60%" width="60%">  </a></li></font>';
} else {
     $youtube = '';
}




if (strlen($foto) <> '' or strlen($foto) > 0) {
     $imgPerfil = 'https://medicalsoftplus.com/baseDev/c_foto/' . $foto;
} else {
     $imgPerfil =  'https://medicalsoftplus.com/baseDev/Emma/avatar.png';
}

if (strlen($foto2) <> '' or strlen($foto2) > 0) {
     $imgPerfil2 = 'https://medicalsoftplus.com/baseDev/c_foto/' . $foto2;
} else {
     $imgPerfil2 =  'https://medicalsoftplus.com/baseDev/Emma/avatar.png';
}
if (strlen($foto5) <> '' or strlen($foto5) > 0) {
     $imgPerfil5 = 'https://medicalsoftplus.com/baseDev/c_foto/' . $foto5;
} else {
     $imgPerfil5 =  'https://medicalsoftplus.com/baseDev/Emma/avatar.png';
}
if (strlen($foto3) <> '' or strlen($foto3) > 0) {
     $imgPerfil3 = 'https://medicalsoftplus.com/baseDev/c_foto/' . $foto3;
} else {
     $imgPerfil3 =  'https://medicalsoftplus.com/baseDev/Emma/avatar.png';
}
if (strlen($foto4) <> '' or strlen($foto4) > 0) {
     $imgPerfil4 = 'https://medicalsoftplus.com/baseDev/c_foto/' . $foto4;
} else {
     $imgPerfil4 =  'https://medicalsoftplus.com/baseDev/Emma/avatar.png';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

     <title>MedicalSoft</title>
     <!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="https://kit.fontawesome.com/fbad884318.css" crossorigin="anonymous">



     <!-- MAIN CSS -->
    <link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/baseDev/Emma/assets/css/tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>
     <style>
          i.fa-solid.fa-m {
               color: blue;
          }
     </style>



     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand"> Medical Center</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#top" class="smoothScroll">Inicio</a></li>
                         <li><a href="#about" class="smoothScroll">Sobre mi</a></li>
                         <li><a href="#team" class="smoothScroll">Especialistas</a></li>
                         <li><a href="#news" class="smoothScroll">Información</a></li>
                         <li><a href="#google-map" class="smoothScroll">Ubicanos</a></li>
                         <li><a href="https://medicalsoftplus.com/baseDev/Emma/login" class="smoothScroll" Target="_blank">Portal de Pacientes</a></li>
                         <li class="appointment-btn"><a href="https://medicalsoftplus.com/baseDev/Emma/calendario/agenda?idUsuario=1&valorconsulta=1500000" Target="_blank">Agenda con nosotros</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Agenda tu cita</h3>
                                        <h1>Tipos de consultas</h1>
                                        <?php

                                        if ($cp == 1) {
                                             echo '<li><h5><i class="lni-check-mark-circle"></i><strong> Consultas presenciales </strong> </h5> </li>';
                                        }
                                        if ($cv == 1) {
                                             echo '<li><h5><i class="lni-check-mark-circle"></i><strong> Consultas Virtuales </strong> </h5> </li>';
                                        }
                                        if ($cd == 1) {
                                             echo '<li><h5><i class="lni-check-mark-circle"></i><strong> Consultas Via Chat </strong> </h5> </li>';
                                        }
                                        ?>
                                        <?php




                                        if (funcionMaster($idUsuarioDoctor, 'usuario_id', 'm3', 'serviciosActivos') == 1) {

                                             if ($whatsapp > 1) {
                                                  echo '<a class="btn btn-common"  target="_blank" href="https://web.whatsapp.com/send?phone=' . $whatsapp . '&text=Hola%20' . $nombre . '%20necesito%20informacion%20para%20una%20consulta"> <i class="lni-whatsapp"></i>  whatsapp  </a>';
                                             }


                                             echo '<br>';
                                             echo '<br>';



                                             //            0 Presenciales y vistuales; 1 Presenciales; 2 Virtuales
                                        }
                                        if ($cp == 1 or $cv == 1 or $cd == 1) {




                                             // echo '<a class="btn btn-common" href="https://medicalsoftplus.com/baseDev/Emma/agendarcita?idUsuario=' . $idUsuarioDoctor . '&nombre=' . $nombre . '&valorconsulta=' . $valorconsulta . '"> <i class="lni-pencil-alt"></i>  Agendar Cita  </a>';
                                             echo '<a class="btn btn-common" href="https://medicalsoftplus.com/baseDev/Emma/calendario/agenda?idUsuario=' . $idUsuarioDoctor . '&valorconsulta=' . $valorconsulta . '"> <i class="lni-pencil-alt"></i>  Agendar Cita  </a>';
                                             echo '<br>';
                                             echo '<br>';




                                             // echo '<a class="btn btn-common" href="https://medicalsoftplus.com/baseDev/Emma/login"> <i class="lni-pencil-alt"></i> Agendar Consulta Virtual </a>';
                                             // echo '<br>';
                                             // echo '<br>';






                                        }




                                        ?>

                                        <!-- <h2>
                                             Consultas presenciales<br>
                                             Consultas Virtuales<br>
                                        </h2> -->
                                        <a href="#team" class="section-btn btn btn-default smoothScroll">
                                             Conoce a nuestros Especialistas
                                        </a>
                                   </div>
                              </div>
                         </div>




                         <div class="item item-second">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Medico Pediatra</h3>
                                        <h1>La medicina es una ciencia de la incertidumbre y un arte de la probabilidad.</h1>
                                        <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Sobre mi</a>
                                   </div>
                              </div>
                         </div>

                         <div class="item item-third">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Te ofrecemos la mejor atención</h3>
                                        <h1>Equipos de ultima generación</h1>
                                        <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Servicios</a>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Bienvenidos a Raccon City <i class="fa-solid fa-m"></i>Medical</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Pediatría, Puericultura, Enfermedades respiratorias, Diarrea, Alimentación del
                                        recién nacido y lactante, Características del crecimiento y desarrollo físico.
                                        Especialistas que atienden todas las patologías relacionadas con los órganos
                                        femeninos como el útero, la vagina y los ovarios, y también de la prevención de
                                        enfermedades futuras. Medicina Materno Fetal, Ginecología y Obstetricia,
                                        Ecografía , Tamizaje Fetal,</p>

                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="images/author-image.jpg" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Dr. Aaron Díaz</h3>
                                        <p>Pediatra</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <center>
                                   <h2 class="wow fadeInUp" data-wow-delay="0.1s">Clinica San Pedro</h2>
                              </center>
                         </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                              <!-- <img src="images/team-image1.jpg" class="img-responsive" alt=""> -->
                              <img src=<?php echo $imgPerfil2 ?> class="img-responsive" alt="">
                              <?php
                              if (strlen($foto2) <> '') {
                                   echo '
                                           <div class="item">
                                           <div class="product-img">
                                           <img class="img-fluid" src="' . $imgPerfil2 . '" alt="">
                                           </div>
                                           </div>
                                           ';
                              } else {
                              }
                              ?>

                              <div class="team-info">
                                   <h3>Nate Baston</h3>
                                   <p>General Principal</p>
                                   <div class="team-contact-info">
                                        <p><i class="fa fa-phone"></i> 010-020-0120</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="#">general@company.com</a></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://es-la.facebook.com/sievensoft/" class="fa fa-facebook" Target="_blank"></a></li>
                                        <li><a href="https://twitter.com/sievensoft?lang=es" class="fa fa-twitter" Target="_blank"></a></li>
                                   </ul>
                              </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <!-- <img src="images/team-image2.jpg" class="img-responsive" alt=""> -->
                              <img src=<?php echo $imgPerfil ?> class="img-responsive" alt="">
                              <?php
                              if (strlen($foto2) <> '') {
                                   echo '
                                           <div class="item">
                                           <div class="product-img">
                                           <img class="img-fluid" src="' . $imgPerfil3 . '" alt="">
                                           </div>
                                           </div>
                                           ';
                              } else {
                              }
                              ?>

                              <div class="team-info">
                                   <h3>Jason Stewart</h3>
                                   <div class="team-contact-info">
                                        <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://es-la.facebook.com/sievensoft/" class="fa fa-facebook" Target="_blank"></a></li>
                                        <li><a href="https://twitter.com/sievensoft?lang=es" class="fa fa-twitter" Target="_blank"></a></li>
                                   </ul>
                              </div>

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <!-- <img src="images/team-image3.jpg" class="img-responsive" alt=""> -->
                              <img src=<?php echo $imgPerfil ?> class="img-responsive" alt="">
                              <?php
                              if (strlen($foto2) <> '') {
                                   echo '
                                           <div class="item">
                                           <div class="product-img">
                                           <img class="img-fluid" src="' . $imgPerfil4 . '" alt="">
                                           </div>
                                           </div>
                                           ';
                              } else {
                              }
                              ?>
                              <div class="team-info">
                                   <h3>Miasha Nakahara</h3>
                                   <p>Cardiology</p>
                                   <div class="team-contact-info">
                                        <p><i class="fa fa-phone"></i> 010-040-0140</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="#">cardio@company.com</a></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://es-la.facebook.com/sievensoft/" class="fa fa-facebook" Target="_blank"></a></li>
                                        <li><a href="https://twitter.com/sievensoft?lang=es" class="fa fa-twitter" Target="_blank"></a></li>
                                   </ul>
                              </div>

                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- NEWS -->
     <section id="news" data-stellar-background-ratio="2.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                              <h2>Mas información</h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                              <a href="news-detail.html" Target="_blank">
                                   <img src="images/news-image1.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="news-detail.html" Target="_blank">Servicios, enfermedades y tratamientos</a></h3>
                                   1. Ginecología Laparoscópica
                                   <br>
                                   2. Patología Cervical
                                   <br>
                                   3. Cirugía Endoscópica Ginecológica
                                   <br>
                                   4. Planificacion Familiar
                                   <br>
                                   5. Colposcopia
                                   <br>
                                   6. Planificación familiar y la anticoncepción
                                   <br>
                                   7. trastornos menstruales
                                   <br>
                                   8. la menopausia
                                   <br>
                                   9. la patología mamaria
                                   <br>
                                   10. Servicios de Urgencias y Hospitalización, con pediatras y todas las subespecialidades pediátricas, disponibles las 24 horas del día.
                                   <br>
                                   11. Unidad de Cuidado Intensivo Pediátrico, Cuidado intermedio y Unidad Neonatal con área para la atención del recién nacido en cuidado intensivo, intermedio o atención básica.
                                   <br>
                                   12. Atención del recién nacido.
                                   <br>
                                   13. Servicios de Apoyo en todas las ramas de terapia y nutrición.
                                   <!-- <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                       <div class="author-info">
                                             <h5>Jeremie Carlson</h5>
                                             <p>CEO / Founder</p>
                                        </div> 
                                   </div> -->
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                              <a href="news-detail.html" Target="_blank">
                                   <img src="images/news-image2.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="news-detail.html" Target="_blank"> Formación Academica</a></h3>
                                   1. UNIVERSIDAD EL BOSQUE
                                   <br>
                                   2. GINECOLOGIA Y OBSTETRICIA: UNIVERSIDAD DE CARTAGENA
                                   <br>
                                   3. SUB ESPECIALISTE EN MEDICINA MATERNO FETAL - PERINATOLOGIA : UNISANITAS
                                   <br>
                                   4. ENDOCRINOLOGIA GINECOLOGICA
                                   <br>
                                   5. Medico y Cirujano General, Escuela de Medicina Juan N. Corpas. (Bogotá, 1995)
                                   <br>
                                   6. Pediatra, Faculdade de Medicina do Triângulo Minero ( Uberaba, Brasil, 2002)
                                   <br>
                                   7. Emergencia Pediatrica, Faculdade de Medicina de Sao José do Rio Preto (Sao José do Rio Preto, Brasil 2003)
                                   <!-- <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Jason Stewart</h5>
                                             <p>General Director</p>
                                        </div>
                                   </div> -->
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <!-- NEWS THUMB -->
                         <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                              <a href="news-detail.html" Target="_blank">
                                   <img src="images/news-image3.jpg" class="img-responsive" alt="">
                              </a>
                              <div class="news-info">
                                   <h3><a href="news-detail.html" Target="_blank">Medical</a>
                                   </h3>
                                   Valor de la consulta: $ 1,500,000 COL
                                   <br>
                                   Dirección : A. Naciones y Nuñez de Vela, Edificio Metropolitan Quito-Ecuador
                                   <br>
                                   Años de experiencia: 12
                                   <br>
                                   Formas de pago: Efectivo-Transferencia.
                                   <!-- <div class="author">
                                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                                        <div class="author-info">
                                             <h5>Andrio Abero</h5>
                                             <p>Online Advertising</p>
                                        </div>
                                   </div> -->
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6 wow fadeInUp">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">

                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Agenda tu Cita</h2>
                              </div>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="CODI_CLIENTE">Documento</label>
                                        <input type="number" class="form-control" id="CODI_CLIENTE" name="CODI_CLIENTE" placeholder="Documento">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Correo</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="date">Día</label>
                                        <input type="date" name="date" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Especialidad</label>
                                        <select class="form-control">
                                             <option>Medicina General</option>
                                             <option>Cardiología</option>
                                             <option>Odontología</option>
                                        </select>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone">Celular</label>
                                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Celular">
                                        <label for="Message">Motivo de Consulta</label>
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Motivo de Consulta"></textarea>

                                        <div class="form-group" style="position: relative;  display: block; margin-top: 20px; margin-bottom: 15px;"> <label>Tipo de consulta</label>
                                             <div class="radio"> <label> <input type="radio" name="tipo" value="0" checked=""><br> Consulta presencial </label> </div>
                                             <div class="radio"> <label> <input type="radio" name="tipo" value="1"><br> Consulta Virtual </label> </div>
                                             <!-- <div class="radio"> <label> <input type="radio" name="tipo" value="3"><br> Consulta Via Chat </label> </div> -->
                                        </div>


                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Guardar</button>
                                   </div>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>




     <!-- GOOGLE MAP -->
     <section id="google-map">
          <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.7074765707066!2d-74.06692794947102!3d4.646173143404619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9b18db67f5b1%3A0x19045873f4dae9eb!2sSievensoft%20company!5e0!3m2!1ses!2sco!4v1674328041972!5m2!1ses!2sco" width="80%" height="350" frameborder="0" style="position: relative;  display: block; margin-top: 20px; margin-bottom: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </section>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Información</h4>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i>573028597604</p>
                                   <p><i class="fa fa-envelope-o"></i><a href="#">prueba@gmail.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Redes Sociales</h4>

                              <ul class="social-icon">
                                   <li><a class="fa fa-facebook"></a></li>
                                   <li><a class="fa fa-twitter"></a></li>
                                   <li><a class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Disponibilidad</h4>
                                   <p>Lunes - Viernes <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Sabados <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Domingos <span>No disponible</span></p>
                              </div>


                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text">
                                   <p>Copyright &copy; 2023 Pulgarcita

                                        | Sitio: <a rel="nofollow" href="https://www.facebook.com/sievensoft" target="_parent">Sievensoft</a></p>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn">
                                   <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/jquery.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/bootstrap.min.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/jquery.sticky.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/jquery.stellar.min.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/wow.min.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/smoothscroll.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/owl.carousel.min.js"></script>
     <script src="https://medicalsoftplus.com/baseDev/Emma/assets/js/custom.js"></script>


</body>

</html>


<script>
     var slideIndex = 1;
     var slideIndex2 = 1;

     showSlides(slideIndex);
     showSlides2(slideIndex2);

     function plusSlides(n) {
          showSlides(slideIndex += n);
     }

     function plusSlides2(n) {
          showSlides2(slideIndex2 += n);
     }

     function currentSlide(n) {
          showSlides(slideIndex = n);
     }

     function currentSlide2(n) {
          showSlides2(slideIndex2 = n);
     }

     function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          var captionText = document.getElementById("caption");
          if (n > slides.length) {
               slideIndex = 1
          }
          if (n < 1) {
               slideIndex = slides.length
          }
          for (i = 0; i < slides.length; i++) {
               slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
               dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
          captionText.innerHTML = dots[slideIndex - 1].alt;
     }

     function showSlides2(n) {
          var o;
          var slides2 = document.getElementsByClassName("mySlides2");
          var dots2 = document.getElementsByClassName("demo2");
          var captionText2 = document.getElementById("caption2");
          if (n > slides2.length) {
               slideIndex2 = 1
          }
          if (n < 1) {
               slideIndex2 = slides2.length
          }
          for (o = 0; o < slides2.length; o++) {
               slides2[o].style.display = "none";
          }
          for (o = 0; o < dots2.length; o++) {
               dots2[o].className = dots2[o].className.replace(" active", "");
          }
          slides2[slideIndex2 - 1].style.display = "block";
          dots2[slideIndex2 - 1].className += " active";
          captionText2.innerHTML = dots2[slideIndex2 - 1].alt;
     }
</script>

</body>

</html>