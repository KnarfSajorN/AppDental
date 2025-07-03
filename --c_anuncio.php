<!DOCTYPE html>

<?php

include 'funciones/conn3.php';



include 'header.php';

include 'menu.php'; ?>

<!-- Script -->

<script src="js/jquery.min-3.2.1.js"></script>

<script src='js/select2.min-4.0.3.js'></script>



<link rel="stylesheet" href="apiVoz.css">

<link rel="stylesheet" href="<?= $Base ?>web/estilosSwitch.css">



<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper p-3">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <h1>



      Configuración directorio médico/Sitio Web

    </h1>

    <!-- <ol class="breadcrumb">

            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

            <li><a href="#"> Configuración del anuncio </a></li>





        </ol> -->

  </section>



  <!-- Main content -->

  <section class="content">

    <div class="row">



      <!-- ============== POR FAVOR, SI SE HACE UNA INSTALACIÓN Y ESTO ESTA COMENTADO POR FAVOR DESCOMENTAR ======================== -->

      <?php if ($_SESSION['ID'] <> 1) { ?>

        <script>
             Swal.fire({
              title: 'Accion no válida',
              text: 'El sitio web solo puede ser configurado por el usuario master',
              icon: 'error',
              confirmButtonText: 'Aceptar',
              allowOutsideClick: false,
              allowEscapeKey: false,
              animation: true,
              customClass: {
                  popup: 'animated tada'
              }
           }).then((result) => {
               if (result.isConfirmed) {
                   window.location.href='portada';
               }
           });
        </script>
      <?php } ?>

      <!-- ============== POR FAVOR, SI SE HACE UNA INSTALACIÓN Y ESTO ESTA COMENTADO POR FAVOR DESCOMENTAR ======================== -->



      <?php

      $usuarioId = $_SESSION['ID'];

      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));













      if ($_GET['ce'] = 1) {



        $idContato = base64_decode($_GET['i']);



        mysqli_query($conn3, "UPDATE c_contactanos SET estado = '1' WHERE id = $idContato;");

      }











      $queryList = mysqli_query($conn3, "SELECT * FROM  c_catalogo where idUsuario=$usuarioId");

      // echo "SELECT * FROM  c_catalogo where idUsuario=$usuarioId";

      if ($queryList) {

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

          $ID = $rowMotorizado['idUsuario'];



          $primario = $rowMotorizado['primario'];

          $secundario = $rowMotorizado['secundario'];

          $banner = $rowMotorizado['banner'];

          $letra = substr(substr($rowMotorizado['letra'], 13), 0, -1);





          $nombre = $rowMotorizado['nombre'];

          $descripcion = $rowMotorizado['descripcion'];

          $valorconsulta = $rowMotorizado['valorconsulta'];

          $profesion = $rowMotorizado['profesion'];



          $categoria = $rowMotorizado['categoria'];

          $categoria2 = $rowMotorizado['categoria2'];



          $pais = $rowMotorizado['pais'];

          $activo = $rowMotorizado['activo'];



          $foto = $rowMotorizado['foto'];



          $foto2 = $rowMotorizado['foto2'];

          $foto3 = $rowMotorizado['foto3'];

          $foto4 = $rowMotorizado['foto4'];

          $foto5 = $rowMotorizado['foto5'];

          $foto6 = $rowMotorizado['foto6'];

          $foto7 = $rowMotorizado['foto7'];

          // LOGO

          $foto8 = $rowMotorizado['foto8'];

          $portada1 = $rowMotorizado['portada1'];

          $portada2 = $rowMotorizado['portada2'];

          $portada3 = $rowMotorizado['portada3'];



          $video1 = $rowMotorizado['video1'];

          $video2 = $rowMotorizado['video2'];

          $video3 = $rowMotorizado['video3'];



          $ciudad = $rowMotorizado['ciudad'];



          $colorPrimario = $rowMotorizado['colorPrimario'];





          $direccionWeb = $rowMotorizado['direccionWeb'];

          $titulo = $rowMotorizado['titulo'];

          $GoogleA = $rowMotorizado['GoogleA'];

          $textoP2 = $rowMotorizado['textoP2'];

          $textoP3 = $rowMotorizado['textoP3'];





          $proySer = $rowMotorizado['proySer'];









          $proySer2 = $rowMotorizado['proySer2'];

          $proySer3 = $rowMotorizado['proySer3'];

          $idiomas = $rowMotorizado['idiomas'];

          $fpago = $rowMotorizado['fpago'];









          $direccion = $rowMotorizado['direccion'];

          $whatsapp = $rowMotorizado['whatsapp'];

          $f = $rowMotorizado['f'];

          $t = $rowMotorizado['t'];

          $i = $rowMotorizado['i'];

          $l = $rowMotorizado['l'];

          $y = $rowMotorizado['y'];

          $telefonos = $rowMotorizado['telefonos'];

          $anosExperiencia = $rowMotorizado['anosExperiencia'];











          $s1 = $rowMotorizado['s1'];

          $s2 = $rowMotorizado['s2'];

          $s3 = $rowMotorizado['s3'];

          $s4 = $rowMotorizado['s4'];

          $s5 = $rowMotorizado['s5'];

          $s6 = $rowMotorizado['s6'];

          $s7 = $rowMotorizado['s7'];

          $s8 = $rowMotorizado['s8'];

          $s9 = $rowMotorizado['s9'];

          $s10 = $rowMotorizado['s10'];

          $s11 = $rowMotorizado['s11'];

          $s12 = $rowMotorizado['s12'];

          $s13 = $rowMotorizado['s13'];

          $s14 = $rowMotorizado['s14'];



          $e1 = $rowMotorizado['e1'];

          $e2 = $rowMotorizado['e2'];

          $e3 = $rowMotorizado['e3'];

          $e4 = $rowMotorizado['e4'];

          $e5 = $rowMotorizado['e5'];

          $e6 = $rowMotorizado['e6'];

          $e7 = $rowMotorizado['e7'];

          $e8 = $rowMotorizado['e8'];

          $e9 = $rowMotorizado['e9'];

          $e10 = $rowMotorizado['e10'];

          $e11 = $rowMotorizado['e11'];

          $e12 = $rowMotorizado['e12'];

          $e13 = $rowMotorizado['e13'];

          $e14 = $rowMotorizado['e14'];

          $tiposConsultas = $rowMotorizado['tiposConsultas'];

          $emailCorporativo = $rowMotorizado['emailCorporativo'];













          $cp = $rowMotorizado['cp'];

          $cv = $rowMotorizado['cv'];

          $cd = $rowMotorizado['cd'];

          $ss = $rowMotorizado['ss'];

          $particular = $rowMotorizado['particular'];

          $segurosA = $rowMotorizado['segurosA'];

        }

      }





      if ($activo == 0) {

        $activo = '<font color="red">INACTIVO,</font> <font color="red" size = "3">Sera activado en minutos una vez se verifique la información</font> ';

      } elseif ($activo == 1) {

        $activo = '<font color="BLUE">ACTIVO</font>';

      }



      ?>













      <div class="card-body">

        <div class="form-row">

          <h4 class="card-title"> </h4>

          <h6 class="card-subtitle mb-2 text-muted"></h6>





          <div class="col-md-6">

          </div>



          <div class="col-md-6">

          </div>





        </div>



        <div class="col-md-12">

          <div class="card">



            <div class="card-header">

              <ul class="nav nav-tabs">

                <li class="nav-item active"><a class="nav-link" href="#Consultas" data-toggle="tab">Información para

                    sitio Web</a></li>



                <li class="nav-item"><a class="nav-link" href="#Consultas3" data-toggle="tab">Foto de

                    <strong>Perfil</strong> y de

                    <strong>Contáctanos</strong> </a>

                </li>

                <!-- <li class="nav-item"><a class="nav-link" href="#Consultas4" data-toggle="tab">Fotos de

                    <strong>Mas información</strong></a></li> -->

                <li class="nav-item"><a class="nav-link" href="#Consultas5" data-toggle="tab">Portadas -

                    Carrusel inicial</a></li>

                <li class="nav-item"><a class="nav-link" href="#Consultas7" data-toggle="tab">Galería de

                    Imágenes - Sitio Web</a></li>

                <li class="nav-item"><a class="nav-link" href="#Consultas8" data-toggle="tab">Galería de

                    Vídeos - Sitio Web</a></li>

                <!-- <li class="nav-item"><a class="nav-link" href="#Consultas9" data-toggle="tab">Estadísticas de visitas</a></li> -->

                <li class="nav-item"><a class="nav-link" href="#formularioContactanos" data-toggle="tab">Mensajes de

                    formularios</a></li>

                <li class="nav-item"><a class="nav-link" href="#formularioUsuariosWeb" data-toggle="tab">Usuarios web

                    -<strong>Citas</strong></a></li>

              </ul>

            </div>



            <div class="card-body">

              <div class="tab-content">

                <div class="active tab-pane" id="Consultas">

                  <div class="col-md-12" align="center">

                    <div>

                      <h3> Estado Actual: <?php echo $activo ?></h3>

                    </div>

                  </div>



                  <div class="form-row">

                    <form action="c_anuncioActualizar.php" method="POST">

                      <div class="col-md-12">









                        <?php if (strlen($direccionWeb) <= 1): ?>



                          <div align="left"> <label> Nombre de tu web </label>

                            <!-- <font color="red" size="1"> (No se permiten espacios ni caracteres

                              especiales, máximo 20 caracteres)</font> -->

                          </div>

                          <!-- <div class="col-md-5" align="right">

                            <font size="5"> medicalsoftplus.com/baseDev/web/ </font>

                          </div>

                          <div class="col-md-7">

                            <input type="text" class="form-control input-lg" id="direccionWeb" name="direccionWeb" value="<?php echo $direccionWeb ?>" maxlength="100" onChange="disponibilidad();" required>

                          </div> -->

                          <div class="input-group mb-3">

                            <input type="text" class="form-control" spellcheck="false" data-ms-editor="true" id="Nomb"

                              name="direccionWeb" placeholder="elmejordoctordelmundo">

                            <div class="input-group-append">

                              <span class="input-group-text">.com</span>

                            </div>

                            <div class="input-group-append">

                              <button class="btn btn-success" id="Enviar" type="button"><i

                                  class="glyphicon glyphicon-search"></i> Buscar</button>

                            </div>

                          </div>



                          <div id="Mostrar"></div>





                        <?php endif ?>













                        <div class="col-md-12" align="center">

                          <div id="div-disponibilidad"></div>



                        </div>

                        <div class="col-md-12" align="center">

                          <?php if (strlen($direccionWeb) > 0): ?>

                            <input type="hidden" class="form-control input-lg" id="direccionWeb" name="direccionWeb"

                              value="<?php echo $direccionWeb ?>" maxlength="20" pattern="[a-z]{1,15}"

                              onChange="disponibilidad();" required>

                            <a href="<?php echo $Base . "web/medico/" . $direccionWeb; ?>" target="_blank">

                              <font size="5">

                                <?php echo $Base . "web/medico/" . $direccionWeb; ?>

                              </font>

                            </a>

                          <?php endif ?>



                        </div>

                      </div>



                      <table class="tg" style="undefined;table-layout: fixed; width: 100%">

                        <colgroup>

                          <col style="width: 48%">

                          <col style="width: 2%">

                          <col style="width: 48%">

                        </colgroup>

                        <tr>

                          <th>

                            <div align="left"> Nombre </div>

                            <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre"

                              value="<?php echo $nombre ?>" maxlength="120"

                              oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                              required>

                            <input type="hidden" class="form-control input-lg" name="usuarioId"

                              value="<?php echo $ID ?>">

                            <input type="hidden" class="form-control input-lg" name="form1" value="1">

                          </th>

                          <th>



                          </th>

                          <th>

                            <div align="left"> Valor Consulta </div>

                            <input type="number" class="form-control input-lg" name="valorconsulta"

                              value="<?php echo $valorconsulta ?>" required>

                          </th>

                        </tr>







                        <tr>

                          <th>

                            <div align="left"> Ciudad </div>

                            <input type="text" name="ciudad" id="ciudad" class="form-control input-lg"

                              value="<?php echo $ciudad ?>">

                            <!-- <select id="ciudad" name="ciudad" class="form-control select2" style="width: 100%;" required="required">

                              <option value="<?php echo $ciudad ?>">

                                <?php echo ciudades($ciudad) ?> </option>





                              <option value="0">Todas</option>

                              <?php echo ciudadesselect(); ?>

                            </select> -->



                          </th>

                          <th>



                          </th>

                          <th>





                            <div align="left"> Años de experiencias </div>

                            <input type="number" min="1" max="99" class="form-control input-lg" name="anosExperiencia"

                              value="<?php echo $anosExperiencia ?>" required>









                          </th>

                        </tr>







                        <tr>

                          <th>





                            <div align="left"> Especialidad </div>



                            <select id="categoria" name="categoria" class="form-control select2"

                              data-placeholder="Seleccione especialidades" style="width: 100%;" required="required">

                              <option value="<?php echo $categoria ?>">

                                <?php echo categoria($categoria) ?>

                              </option>

                              <?php categoriaselect() ?>

                            </select>







                          </th>

                          <th>



                          </th>

                          <th>







                            <div align="left"> Especialidad 2</div>



                            <select id="categoria2" name="categoria2" class="form-control select2"

                              data-placeholder="Seleccione especialidades" style="width: 100%;" required>

                              <option value="<?php echo $categoria2 ?>">

                                <?php echo categoria($categoria2) ?>

                              </option>

                              <?php categoriaselect() ?>

                            </select>







                          </th>

                        </tr>











                        <tr>

                          <th>

                            <div align="left"> Números de contacto </div>

                            <input type="text" class="form-control input-lg" name="telefonos"

                              value="<?php echo $telefonos ?>" required>



                          </th>

                          <th>



                          </th>



                          <th>

                            <div align="left"> Números de WhatsApp </div>

                            <input type="text" class="form-control input-lg" name="whatsapp" placeholder="573259846587"

                              value="<?php echo $whatsapp ?>" required>

                          </th>



                        </tr>















                        <tr>

                          <th>

                            <div align="left">Idiomas </div>

                            <input type="text" class="form-control input-lg" name="idiomas"

                              value="<?php echo $idiomas ?>" required>



                          </th>

                          <th>





                          </th>

                          <th>

                            <div align="left"> Formas de pago </div>

                            <input type="text" class="form-control input-lg" name="fpago" value="<?php echo $fpago ?>"

                              required>



                          </th>

                        </tr>

                        <tr>

                          <th>

                            <div align="left">E-mail corporativo</div>

                            <input type="text" class="form-control input-lg" name="emailCorporativo"

                              value="<?php echo $emailCorporativo ?>" required>

                          </th>

                          <th>

                          </th>

                          <th>

                            <div align="left">Color primario</div>

                            <input type="color" class="form-control input-lg" name="colorPrimario"

                              value="<?php echo $colorPrimario ?>" required>

                          </th>

                        </tr>













                        <tr>

                          <th>

                            <div align="left"> Tipos de consultas </div>





                            <?php if ($cp == 1) {

                              echo '<input type="checkbox" name="cp" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">En mi consultorio  </label>';

                            } else

                              echo '<input type="checkbox" name="cp"/><label for="ContentPlaceHolderContent_chklSeguros_0"> En mi consultorio </label>';

                            ?>









                            <?php if ($cv == 1) {

                              echo '<input type="checkbox" name="cv" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">En su casa(Domicilios)  </label>';

                            } else

                              echo '<input type="checkbox" name="cv"/><label for="ContentPlaceHolderContent_chklSeguros_0"> En su casa(Domicilios) </label>';

                            ?>





                            <?php if ($cd == 1) {

                              echo '<input type="checkbox" name="cd" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Virtuales  </label>';

                            } else

                              echo '<input type="checkbox" name="cd"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Virtuales  </label>';

                            ?>



                            <!--

          <select id="tiposConsultas" name="tiposConsultas" class="form-control select2" style="width: 100%;" required="required">



<?php if ($tiposConsultas == 0) {

  echo '       <option value="0" select>  Virtual y presencial   </option>

             <option value="1"> Solo presencial   </option>

             <option value="2"> Solo Virtual   </option>

        ';

} elseif ($tiposConsultas == 1) {

  echo '       

<option value="1" select>  Solo presencial   </option>

<option value="0"> Virtual y presencial   </option>

             

             <option value="2"> Solo Virtual   </option>

        ';

} elseif ($tiposConsultas == 2) {

  echo '      

 <option value="2" select> Solo Virtual   </option>

  <option value="0"> Virtual y presencial   </option>

             <option value="1"> Solo presencial   </option>

            

        ';

}













?>

-->

                            <!--  

                0 Presenciales y vistuales; 1 Presenciales; 2 Virtuales

              -->

                            </select>



                          </th>

                          <th>



                          </th>

                          <th>

                            <!--  

          <form></form>





           <div align="left">    <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" ><h4> Modo vacaciones  </h4></button>        </div> 

         -->





                          </th>

                        </tr>









                      </table>





                      <div align="left" style="color: red"> URL DE GOOGLE MAPS </div>

                      <input type="text" class="form-control input-lg" id="GoogleA" name="GoogleA"

                        value="<?php echo htmlspecialchars($GoogleA) ?>">

                      <div class="col-sm-12">

                        <label class="control-label"> <a data-toggle="modal" data-target="#modal-maps">Como obtener

                            enlace de Maps</a>

                        </label>

                      </div>



                      <!-- DESCOMENTAR CUANDO SE FINALICE EL MINISITIO -->

                      <!-- <div align="left" style="">Video demo (Youtube)</div>

                      <input type="text" class="form-control input-lg" id="videoDemo_Youtube" name="videoDemo_Youtube" value="<?php echo htmlspecialchars($videoDemo_Youtube) ?>"> -->

                      <!-- DESCOMENTAR CUANDO SE FINALICE EL MINISITIO -->



                      <!-- Modal youtube -->

                      <div class="modal fade" id="modal-maps" tabindex="-1" role="dialog"

                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h5 class="modal-title" id="exampleModalLabel">Como obtener

                                enlace del vídeo</h5>

                            </div>

                            <div class="modal-body">

                              <h4 class="text-primary">1. En tu navegador, en el buscador

                                abres MAPS.</h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps1.png">

                              </div>

                              <h4 class="text-primary">2. Colocas la dirección de tu

                                Institución.</h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps2.png">

                              </div>

                              <h4 class="text-primary">3. En la parte inferior, tenemos el

                                botón de "Compartir".</h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps3.png">

                              </div>

                              <h4 class="text-primary">4. Le damos a la opción "Insertar".

                              </h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps4.png">

                              </div>

                              <!-- <h4 class="text-primary">5. Nos mostrara el siguiente link, le damos "Copiar HTML".</h4>

                          <div class="img img-responsive center text-center" align="center">

                            <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps5.png">

                          </div> -->

                              <h4 class="text-primary">5. Se recomienda darle a la opción

                                de

                                "Tamaño Personalizado"</h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps7.png">

                              </div>

                              <h4 class="text-primary">6. Allí colocar las medidas

                                "1000x350"

                              </h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps8.png">

                              </div>

                              <h4 class="text-primary">7. Copiamos el link y lo insertamos

                                en

                                el campo indicado.</h4>

                              <div class="img img-responsive center text-center" align="center">

                                <img class="w-100 img img-responsive" src="web/c_foto/Maps/maps6.png">

                              </div>

                            </div>

                            <div class="modal-footer">

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            </div>

                          </div>

                        </div>

                      </div>





                      <div align="left"> Titulo (Nombre de la página) </div>

                      <input type="text" class="form-control input-lg" id="titulo" name="titulo"

                        value="<?php echo $titulo ?>">

                      5





                      <div align="left"> Dirección </div>

                      <input type="text" class="form-control input-lg" id="direccion" name="direccion"

                        value="<?php echo $direccion ?>">



                      <hr>

                      <div align="left"> <label> Redes Sociales</label>

                        <font color="red" size="1"> De no poseer solo dejar en blanco </font>

                      </div>

                      <div align="left"> facebook </div>

                      <input type="text" class="form-control input-lg" id="f" name="f" value="<?php echo $f ?>"

                        placeholder="https://www.facebook.com/meidcocarlos">

                      <div align="left"> twitter </div>

                      <input type="text" class="form-control input-lg" id="t" name="t" value="<?php echo $t ?>"

                        placeholder="https://twitter.com/meidcocarlos">



                      <div align="left"> Instagram </div>

                      <input type="text" class="form-control input-lg" id="i" name="i" value="<?php echo $i ?>"

                        placeholder="https://www.instagram.com/drcarlos/">



                      <div align="left"> LinkedIn </div>

                      <input type="text" class="form-control input-lg" id="l" name="l" value="<?php echo $l ?>"

                        placeholder="https://www.linkedin.com/in/carlos">



                      <div align="left"> YouTube </div>

                      <input type="text" class="form-control input-lg" id="y" name="y" value="<?php echo $y ?>"

                        placeholder="https://www.youtube.com/channel/UCqDvamKNUCuNbtyWmUYOirA">



                      <hr>





                      <br>

                      <label>Descripción resumida de su perfil profesional </label>

                      <input type="text" class="form-control input-lg" name="descripcion" placeholder="descripcion"

                        value="<?php echo $descripcion ?>" required>







                      <br>

                      <hr>

                      <label> Perfil profesional </label>

                      <textarea class="editorJR" name="proySer">

    <?php echo $proySer ?>     

  </textarea>



                      <hr>

                      <label> Servicios, enfermedades y tratamientos: </label>

                      <textarea id="editor2" name="proySer2" class="editorJR">

    <?php echo $proySer2 ?>     

  </textarea>

                      <!-- <textarea class="" name="proySer2"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $proySer2 ?></textarea> -->

                      <hr>

                      <label> Formación Académica </label>

                      <textarea id="editor3" name="proySer3" class="editorJR">

    <?php echo $proySer3 ?>     

  </textarea>

                      <!-- <textarea class="" name="proySer3" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $proySer3 ?></textarea> -->





                      <br>











                      <div class="row">

                        <div class="col-md-12">

                          <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->

                          <label class="labelmarginbottom">Seguros:</label>

                          <textarea id="editor3" name="segurosA" class="editorJR">

                          <?php echo $segurosA ?>     

                        </textarea>

                          <!-- <table>

                          <tr>

                            <?php if ($s1 == 1) {

                              echo '<td><input type="checkbox" name="s1"  checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Allianz</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s1"  /><label for="ContentPlaceHolderContent_chklSeguros_0">Allianz</label></td>';



                            ?>



                            <?php if ($s8 == 1) {

                              echo '<td><input type="checkbox" name="s8" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Mapfre</label></td>  ';

                            } else

                              echo '<td><input type="checkbox" name="s8"  /><label for="ContentPlaceHolderContent_chklSeguros_0">Mapfre</label></td>  ';



                            ?>



                          </tr>



                          <tr>

                            <?php if ($s2 == 1) {

                              echo '<td><input type="checkbox" name="s2" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Colmédica</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s2"/><label for="ContentPlaceHolderContent_chklSeguros_0">Colmédica</label></td>';



                            ?>



                            <?php if ($s9 == 1) {

                              echo '<td><input type="checkbox" name="s9" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Medplus</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s9"/><label for="ContentPlaceHolderContent_chklSeguros_0">Medplus</label></td>';



                            ?>





                          </tr>



                          <tr>



                            <?php if ($s3 == 1) {

                              echo '<td><input type="checkbox" name="s3" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">AXA Colpatria</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s3"/><label for="ContentPlaceHolderContent_chklSeguros_0">AXA Colpatria</label></td>';



                            ?>





                            <?php if ($s10 == 1) {

                              echo '<td><input type="checkbox" name="s10" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">MetLife</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s10"/><label for="ContentPlaceHolderContent_chklSeguros_0">MetLife</label></td>';



                            ?>









                          </tr>



                          <tr>





                            <?php if ($s4 == 1) {

                              echo '<td><input type="checkbox" name="s4" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Colsanitas</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s4"/><label for="ContentPlaceHolderContent_chklSeguros_0">Colsanitas</label></td>';



                            ?>







                            <?php if ($s11 == 1) {

                              echo '<td><input type="checkbox" name="s11" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Pan-American Life</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s11"/><label for="ContentPlaceHolderContent_chklSeguros_0">Pan-American Life</label></td>';



                            ?>











                          </tr>



                          <tr>







                            <?php if ($s5 == 1) {

                              echo '<td><input type="checkbox" name="s5" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Coomeva MP</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s5"/><label for="ContentPlaceHolderContent_chklSeguros_0">Coomeva MP</label></td>';



                            ?>







                            <?php if ($s12 == 1) {

                              echo '<td><input type="checkbox" name="s12" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Seguros Bolivar</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s12"/><label for="ContentPlaceHolderContent_chklSeguros_0">Seguros Bolivar</label></td>';



                            ?>







                          </tr>



                          <tr>

                            <?php if ($s6 == 1) {

                              echo '<td><input type="checkbox" name="s6" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Generali</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s6"/><label for="ContentPlaceHolderContent_chklSeguros_0">Generali</label></td>';



                            ?>



                            <?php if ($s13 == 1) {

                              echo '<td><input type="checkbox" name="s13" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Suramericana</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s13"/><label for="ContentPlaceHolderContent_chklSeguros_0">Suramericana</label></td>';



                            ?>



                          </tr>



                          <tr>

                            <?php if ($s7 == 1) {

                              echo '<td><input type="checkbox" name="s7" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Liberty</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s7"/><label for="ContentPlaceHolderContent_chklSeguros_0">Liberty</label></td>';



                            ?>



                            <?php if ($s14 == 1) {

                              echo '<td><input type="checkbox" name="s14" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Medisanitas</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="s14"/><label for="ContentPlaceHolderContent_chklSeguros_0">Medisanitas</label></td>';



                            ?>







                          </tr>



                        </table> -->

                        </div>





                        <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <label class="labelmarginbottom">E.P.S aceptadas:</label>

                        <table>

                          <tr>

                            <?php if ($e1 == 1) {

                              echo '<td><input type="checkbox" name="e1" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Aliansalud</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e1"/><label for="ContentPlaceHolderContent_chklSeguros_0">Aliansalud</label></td>';



                            ?>



                            <?php if ($e8 == 1) {

                              echo '<td><input type="checkbox" name="e8" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Mutual Ser</label></td>  ';

                            } else

                              echo '<td><input type="checkbox" name="e8"/><label for="ContentPlaceHolderContent_chklSeguros_0">Mutual Ser</label></td>  ';



                            ?>



                          </tr>



                          <tr>

                            <?php if ($e2 == 1) {

                              echo '<td><input type="checkbox" name="e2" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Cafesalud</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e2"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Cafesalud </label></td>';



                            ?>



                            <?php if ($e9 == 1) {

                              echo '<td><input type="checkbox" name="e9" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">  Nueva EPS</label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e9"/><label for="ContentPlaceHolderContent_chklSeguros_0">  Nueva EPS</label></td>';



                            ?>





                          </tr>



                          <tr>



                            <?php if ($e3 == 1) {

                              echo '<td><input type="checkbox" name="e3" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Colmedica EPS </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e3"/><label for="ContentPlaceHolderContent_chklSeguros_0">  Colmedica EPS</label></td>';



                            ?>





                            <?php if ($e10 == 1) {

                              echo '<td><input type="checkbox" name="e10" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Sanitas </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e10"/><label for="ContentPlaceHolderContent_chklSeguros_0">  Sanitas</label></td>';



                            ?>









                          </tr>



                          <tr>





                            <?php if ($e4 == 1) {

                              echo '<td><input type="checkbox" name="e4" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Comfenalco </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e4"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Comfenalco </label></td>';



                            ?>







                            <?php if ($e11 == 1) {

                              echo '<td><input type="checkbox" name="e11" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Salud Total  </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e11"/><label for="ContentPlaceHolderContent_chklSeguros_0">Salud Total   </label></td>';



                            ?>











                          </tr>



                          <tr>







                            <?php if ($e5 == 1) {

                              echo '<td><input type="checkbox" name="e5" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">  Compensar   </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e5"/><label for="ContentPlaceHolderContent_chklSeguros_0">  Compensar  </label></td>';



                            ?>







                            <?php if ($e12 == 1) {

                              echo '<td><input type="checkbox" name="e12" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">  Saludvida </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e12"/><label for="ContentPlaceHolderContent_chklSeguros_0">  Saludvida </label></td>';



                            ?>







                          </tr>



                          <tr>

                            <?php if ($e6 == 1) {

                              echo '<td><input type="checkbox" name="e6" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Coomeva  </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e6"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Coomeva </label></td>';



                            ?>



                            <?php if ($e13 == 1) {

                              echo '<td><input type="checkbox" name="e13" checked/><label for="ContentPlaceHolderContent_chklSeguros_0">Sura  </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e13"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Sura </label></td>';



                            ?>



                          </tr>



                          <tr>

                            <?php if ($e7 == 1) {

                              echo '<td><input type="checkbox" name="e7" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Famisanar </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e7"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Famisanar </label></td>';



                            ?>



                            <?php if ($e14 == 1) {

                              echo '<td><input type="checkbox" name="e14" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Comparta </label></td>';

                            } else

                              echo '<td><input type="checkbox" name="e14"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Comparta </label></td>';



                            ?>







                          </tr>



                        </table>







                      </div> -->

                      </div>

                      <hr>

                      <table>

                        <tr>

                          <?php if ($ss == 1) {

                            echo '<td><input type="checkbox" name="ss" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Sin seguro </label></td>';

                          } else

                            echo '<td><input type="checkbox" name="ss"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Sin seguro  </label></td>';



                          ?>



                          <?php if ($particular == 1) {

                            echo '<td><input type="checkbox" name="particular" checked/><label for="ContentPlaceHolderContent_chklSeguros_0"> Particular </label></td>';

                          } else

                            echo '<td><input type="checkbox" name="particular"/><label for="ContentPlaceHolderContent_chklSeguros_0"> Particular </label></td>';



                          ?>







                        </tr>

                      </table>





                      <div class="box-footer">

                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                          <h4> Actualizar </h4>

                        </button>



                      </div>



                    </form>



                  </div>







                </div>

                <!-- /.tab-pane -->



















                <div class="tab-pane" id="Consultas3">



                  <form action="c_anuncioActualizar.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">

                    <input type="hidden" class="form-control input-lg" name="form3" value="1">

                    <div class="form-row">











                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p-3">



                        <div align="left">

                          <h3> Logo </h3>

                        </div>

                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 200px/100px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen8">

                        <div class="center text-center">

                          <?php

                          // echo strlen($logoF);

                          if (strlen($foto8) > 0) {

                            echo '<img class="img img-responsive" style="max-width: 100%;" src="' . $Base . 'c_foto/' . $foto8 . '">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          } else {

                            echo '';

                          }

                          ?>

                        </div>



                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 p-3">



                        <div align="left">

                          <h3> Foto de Perfil </h3>

                        </div>

                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen">

                        <div class="center text-center">

                          <?php

                          // echo strlen($logoF);

                          if (strlen($foto) > 0) {

                            echo '<img class="img img-responsive" style="max-width: 100%;" src="' . $Base . 'c_foto/' . $foto . '">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          } else {

                            echo '';

                          }

                          ?>

                        </div>



                      </div>





                      <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <h3> Foto de Contáctenos </h3>



                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen3">

                        <div class="center text-center">

                          <?php



                          // echo strlen($logoF);

                          if (strlen($foto3) > 1) {

                            echo '<img class="img img-responsive" style="max-width: 100%;" src="' . $Base . 'c_foto/' . $foto3 . '">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          } else {

                            echo 'Imagen No Cargada';

                          }

                          ?>

                        </div>

                      </div> -->

















                      <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                        <h4> Actualizar </h4>

                      </button>



                    </div>



                  </form>



                </div>













                <div class="tab-pane" id="Consultas4">





                  <form action="c_anuncioActualizar.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">

                    <input type="hidden" class="form-control input-lg" name="form4" value="1">

                    <div class="form-row">









                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



                        <div align="left">

                          <h3> Imagen 1 </h3>

                        </div>

                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen2">

                        <?php



                        // echo strlen($logoF);

                        if (strlen($foto2) > 1) {

                          echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto2 . '">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                        } else {

                          echo 'Imagen No Cargada';

                        }

                        ?>



                      </div>



                      <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



                      <div align="left">

                        <h3> Imagen 2 </h3>

                      </div>

                      <div align="left">

                        <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se permite archivos .png </font>

                      </div>

                      <input type="file" class="form-control input-lg" name="imagen3">

                      <?php



                      // echo strlen($logoF);

                      if (strlen($foto3) > 1) {

                        echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto3 . '">';

                        //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                        //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                        //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                      } else {

                        echo 'Imagen No Cargada';

                      }

                      ?>



                    </div> -->

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">









                        <div align="left">

                          <h3> Imagen 2 </h3>

                        </div>

                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen4">

                        <?php



                        // echo strlen($logoF);

                        if (strlen($foto4) > 1) {

                          echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto4 . '" width="90%">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                        } else {

                          echo 'Imagen No Cargada';

                        }

                        ?>



                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



                        <div align="left">

                          <h3> Imagen 3 </h3>

                        </div>

                        <div align="left">

                          <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se

                            permite

                            archivos .png </font>

                        </div>

                        <input type="file" class="form-control input-lg" name="imagen5">

                        <?php



                        // echo strlen($logoF);

                        if (strlen($foto5) > 1) {

                          echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto5 . '">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                          //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                        } else {

                          echo 'Imagen No Cargada';

                        }

                        ?>



                      </div>









                      <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                        <h4> Actualizar </h4>

                      </button>



                    </div>



                  </form>













                </div>



                <div class="tab-pane" id="Consultas5">



                  <form action="c_anuncioActualizar.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">

                    <input type="hidden" class="form-control input-lg" name="formColores" value="1">

                    <div class="form-row">



                      <div class="col-md-12">

                        <div class="col-md-12 center text-center">

                          <h2>Personalice su sitio Web</h2>

                        </div>



                        <!-- <div class="col-md-6 col-xs-12">

                        <!-- small box -->

                        <!-- <div class="box box-info">

                          <div class="inner">

                            <h3>Color Primario</h3>

                            <p>Para Botones, enlaces e iconos</p>

                            <hr>

                            <label for="">Selecciona el color Principal</label>

                            <input class="input-lg form-control" type="color" id="primario" name="primario" value="<?php echo $primario ?>">

                          </div>

                          <div class="icon">

                            <i class="ion ion-bag"></i>

                          </div>

                        </div>

                      </div> -->



                        <!-- <div class="col-md-6 col-xs-12">

                        <!-- small box -->

                        <!-- <div class="box box-info">

                          <div class="inner">

                            <h3>Texto</h3>

                            <p>-</p>

                            <hr>

                            <label for="">Tipografia de la pagina</label>

                            <select class="input-lg form-control" name="letra">

                              <option value="<?php echo $letra ?>">Actual: <?php echo $letra ?></option>

                              <option style="font-family: Arial;" value='font-family: Arial;'>Arial</option>

                              <option style="font-family: Arial Black;" value='font-family: Arial Black;'>Arial Black</option>

                              <option style="font-family: Arial narrow;" value='font-family: Arial narrow;'>Arial narrow</option>

                              <option style="font-family: Arial Rounded MT Bold;" value='font-family: Arial Rounded MT Bold;'>Arial Rounded MT Bold</option>

                              <option style="font-family: Helvetica;" value='font-family: Helvetica;'>Helvetica</option>

                              <option style="font-family: Verdana;" value='font-family: Verdana;'>Verdana</option>

                              <option style="font-family: Calibri;" value='font-family: Calibri;'>Calibri</option>

                              <option style="font-family: Noto;" value='font-family: Noto;'>Noto</option>

                              <option style="font-family: Lucida Sans;" value='font-family: Lucida Sans;'>Lucida Sans</option>

                              <option style="font-family: Gill Sans;" value='font-family: Gill Sans;'>Gill Sans</option>

                              <option style="font-family: Century Gothic;" value='font-family: Century Gothic;'>Century Gothic</option>

                              <option style="font-family: Candara;" value='font-family: Candara;'>Candara</option>

                              <option style="font-family: Futara;" value='font-family: Futara;'>Futara</option>

                              <option style="font-family: Franklin Gothic Medium;" value='font-family: Franklin Gothic Medium;'>Franklin Gothic Medium</option>

                              <option style="font-family: Trebuchet MS;" value='font-family: Trebuchet MS;'>Trebuchet MS</option>

                              <option style="font-family: Geneva;" value='font-family: Geneva;'>Geneva</option>

                              <option style="font-family: Segoe UI;" value='font-family: Segoe UI;'>Segoe UI</option>

                              <option style="font-family: Optima;" value='font-family: Optima;'>Optima</option>

                              <option style="font-family: Avanta Garde;" value='font-family: Avanta Garde;'>Avanta Garde</option>

                              <option style="font-family: Times New Roman;" value='font-family: Times New Roman;'>Times New Roman</option>

                              <option style="font-family: Big Caslon;" value='font-family: Big Caslon;'>Big Caslon</option>

                              <option style="font-family: Bodoni MT;" value='font-family: Bodoni MT;'>Bodoni MT</option>

                              <option style="font-family: Book Antiqua;" value='font-family: Book Antiqua;'>Book Antiqua</option>

                              <option style="font-family: Bookman;" value='font-family: Bookman;'>Bookman</option>

                              <option style="font-family: New Century Schoolbook;" value='font-family: New Century Schoolbook;'>New Century Schoolbook</option>

                              <option style="font-family: Calisto MT;" value='font-family: Calisto MT;'>Calisto MT</option>

                              <option style="font-family: Cambria;" value='font-family: Cambria;'>Cambria</option>

                              <option style="font-family: Didot;" value='font-family: Didot;'>Didot</option>

                              <option style="font-family: Garamond;" value='font-family: Garamond;'>Garamond</option>

                              <option style="font-family: Georgia;" value='font-family: Georgia;'>Georgia</option>

                              <option style="font-family: Goudy Old Style;" value='font-family: Goudy Old Style;'>Goudy Old Style</option>

                              <option style="font-family: Hoefler Text;" value='font-family: Hoefler Text;'>Hoefler Text</option>

                              <option style="font-family: Lucida Bright;" value='font-family: Lucida Bright;'>Lucida Bright</option>

                              <option style="font-family: Palatino;" value='font-family: Palatino;'>Palatino</option>

                              <option style="font-family: Perpetua;" value='font-family: Perpetua;'>Perpetua</option>

                              <option style="font-family: Rockwell;" value='font-family: Rockwell;'>Rockwell</option>

                              <option style="font-family: Rockwell Extra Bold;" value='font-family: Rockwell Extra Bold;'>Rockwell Extra Bold</option>

                              <option style="font-family: Baskerville;" value='font-family: Baskerville;'>Baskerville</option>

                              <option style="font-family: Consolas;" value='font-family: Consolas;'>Consolas</option>

                              <option style="font-family: Courier;" value='font-family: Courier;'>Courier</option>

                              <option style="font-family: Courier New;" value='font-family: Courier New;'>Courier New</option>

                              <option style="font-family: Lucida Console;" value='font-family: Lucida Console;'>Lucida Console</option>

                              <option style="font-family: Lucidatypewriter;" value='font-family: Lucidatypewriter;'>Lucidatypewriter</option>

                              <option style="font-family: Lucida Sans Typewriter;" value='font-family: Lucida Sans Typewriter;'>Lucida Sans Typewriter</option>

                              <option style="font-family: Monaco;" value='font-family: Monaco;'>Monaco</option>

                              <option style="font-family: Andale Mono;" value='font-family: Andale Mono;'>Andale Mono</option>

                            </select>



                          </div>

                        </div>

                      </div> -->







                        <div class="col-md-12 center text-center">

                          <h2>Foto de los Slider o carruseles iniciales</h2>

                        </div>



                        <div class="form-row">

                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



                            <div align="left">

                              <h3> Imagen 1 </h3>

                            </div>



                            <div align="left">

                              <font color="red" size="5"> Tamaño sugerido 1633px/650px,

                                solo

                                se permite archivos .png </font>

                            </div>

                            <input type="file" class="form-control input-lg" name="portada1">

                            <?php



                            if (strlen($portada1) > 1) {

                              echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $portada1 . '">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            } else {

                              // echo 'Imagen No Cargada';

                            }

                            ?>



                          </div>



                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



                            <div align="left">

                              <h3> Imagen 2 </h3>

                            </div>



                            <div align="left">

                              <font color="red" size="5"> Tamaño sugerido 1633px/650px,

                                solo

                                se permite archivos .png </font>

                            </div>

                            <input type="file" class="form-control input-lg" name="portada2">

                            <?php



                            // echo strlen($logoF);

                            if (strlen($portada2) > 1) {

                              echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $portada2 . '">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            } else {

                              echo 'Imagen No Cargada';

                            }

                            ?>



                          </div>

                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">









                            <div align="left">

                              <h3> Imagen 3 </h3>

                            </div>



                            <div align="left">

                              <font color="red" size="5"> Tamaño sugerido 1633px/650px,

                                solo

                                se permite archivos .png </font>

                            </div>

                            <input type="file" class="form-control input-lg" name="portada3">

                            <?php



                            // echo strlen($logoF);

                            if (strlen($portada3) > 1) {

                              echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $portada3 . '" width="90%">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                              //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

                            } else {

                              echo 'Imagen No Cargada';

                            }

                            ?>



                          </div>

                          <div class="col-md-12">

                            <div class="form-group">

                              <h3> Texto de portada (2) </h3>

                              <textarea name="textoP2"><?php echo $textoP2 ?></textarea>

                            </div>

                            <div class="form-group">

                              <h3> Texto de portada (3) </h3>

                              <textarea name="textoP3"><?php echo $textoP3 ?></textarea>

                            </div>

                          </div>

                        </div>



                        <!-- <div class="col-lg-12 col-xs-12">

                        <!-- small box -->

                        <!-- <div class="box box-info">

                          <div class="inner">

                            <h3>Banner Principal</h3>



                            <div class="col-md-12"> -->

                        <?php

                        // seleccionar imagenes para banner, si agregan mas subir a carpeta /assets/banner/NUMERO.jpg

                        //         for ($i = 1; $i <= 8; $i++) {

                        //           echo '

                        //         <div class="col-md-6">

                        //         <label>';

                        

                        //                         if ($banner == $i) {

                        //                           echo '<input type="radio" name="banner" id="banner' . $i . '" value="' . $i . '" checked >';

                        //                         } else {

                        //                           echo '<input type="radio" name="banner" id="banner' . $i . '" value="' . $i . '" >';

                        //                         }

                        //                         echo '

                        //         <img class="img img-responsive w-100" style="border-radius:50px" src="' . $Base . 'web/assets/banners/' . $i . '.jpg">

                        //         </label>

                        //         </div>';

                        //         }

                        //         

                        ?>

                        <!-- //       </div>

                      //     </div>

                      //     <div class="icon">

                      //       <i class="ion ion-bag"></i>

                      //     </div>

                      //   </div>

                      // </div> -->







                      </div>

















                      <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" id="colores"

                        name="colores">

                        <h4> Actualizar </h4>

                      </button>



                    </div>



                  </form>



                </div>









                <div class="tab-pane" id="Consultas6">

                  <div class="row">

                    <!DOCTYPE html>

                    <?php



                    $clienteId = $_GET['clienteId'];

                    $usuarioId = $_GET['usuarioId'];



                    $ID = $_SESSION['ID'];





                    include 'funciones/conn3.php';



                    // utf8

                    mysqli_set_charset($conn3, "utf8");









                    $idNoticia = $_GET['idNoticia'];





                    if ($_GET['idNoticia']) {



                      if ($connGlobal) {

                        $queryList = mysqli_query($connGlobal, "SELECT * FROM  noticias where id=$idNoticia");

                        $rowNoticia = mysqli_fetch_array($queryList);

                      }

                    }







                    ?>

                    <?php if ($_GET['idNoticia']): ?>



                      <form action="configActualizarhmNoticias.php" method="POST" enctype="multipart/form-data">



                        <div class="box-body">



                          <div class="col-md-12">

                            <font size="1">

                              <h3 align="center">Editar </h3>

                            </font>

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Editor</div>

                            <input type="text" class="form-control input-lg" name="editor"

                              value="<?php echo ($connGlobal) ? $rowNoticia['editor'] : '' ?>">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Titulo</div>

                            <input type="text" class="form-control input-lg" name="titulo"

                              value="<?php echo ($connGlobal) ? $rowNoticia['titulo'] : '' ?>">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Slug de titulo (lo-mas-relevante-en-medicina-2023)

                            </div>

                            <input type="text" class="form-control input-lg" name="slug"

                              value="<?= ($connGlobal) ? $rowNoticia['slug'] : '' ?>" onchange="slugTitulo(this.value)">

                            <small id="mensajeSlug"></small>

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Descripción</div>

                            <input type="text" class="form-control input-lg" name="descripcion"

                              value="<?php echo ($connGlobal) ? $rowNoticia['descripcion'] : '' ?>">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Imagen miniatura</div>

                            <img src="<?= ($connGlobal) ? $rowNoticia['img'] : '' ?>" style="width:200px; height:auto;">

                            <input type="file" class="form-control input-lg" name="img">

                          </div>

                          <div class="form-group col-md-12">

                            <textarea id="" class="editorJR"

                              name="blog"><?php echo ($connGlobal) ? $rowNoticia['blog'] : '' ?></textarea>

                          </div>

                        </div>

                        <input type="hidden" name="usuario" value="<?php echo $_SESSION['ID'] ?>">

                        <input type="hidden" name="idNoticia" value="<?php echo $idNoticia ?>">



                        <div class="col-sm-12">



                          <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                              <h2> <strong> A C T U A L I Z A R </strong> </h2>

                            </button></center>



                        </div>

                        <input type="hidden" name="tipo_cliente" valur="1">

                      </form>



                    <?php endif ?>

                    <!-- *********************************************  ********************************************* -->

                    <!-- *********************************************  ********************************************* -->

                    <!-- *********************************************  ********************************************* -->

                    <!-- ************************* Formulario para Registrar Nuevo   ******************************** -->

                    <!-- *********************************************  ********************************************* -->

                    <!-- *********************************************  ********************************************* -->

                    <!-- *********************************************  ********************************************* -->

                    <?php if ($idNoticia == ''):

                      ?>



                      <form action="../configGuardarhmNoticias.php" method="POST" enctype="multipart/form-data">





                        <div class="box-body">

                          <div class="col-md-12">

                            <font size="1">

                              <h3 align="center">Agregar Nueva Noticia</h3>

                            </font>

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Editor</div>

                            <input type="text" class="form-control input-lg" name="editor" value="Doctor">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Titulo</div>

                            <input type="text" class="form-control input-lg" name="titulo" value="">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Slug de titulo (lo-mas-relevante-en-medicina-2023)

                            </div>

                            <input type="text" class="form-control input-lg" name="slug" value=""

                              onchange="slugTitulo(this.value)">

                            <small id="mensajeSlug"></small>

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Descripción</div>

                            <input type="text" class="form-control input-lg" name="descripcion" value="">

                          </div>

                          <div class="form-group col-md-12">

                            <div align="left">Imagen miniatura</div>

                            <img src="<?= $rowNoticia['img'] ?>" style="width:200px; height:auto;">

                            <input type="file" class="form-control input-lg" name="img">

                          </div>

                          <div class="form-group col-md-12">

                            <textarea id="" class="editorJR" name="blog"><?php echo $blog ?></textarea>

                          </div>





                        </div>





                        <input type="hidden" name="usuario" value="<?php echo $_SESSION['ID'] ?>">



                        <div class="col-sm-12">



                          <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                              <h2> <strong> G u a r d a r </strong> </h2>

                            </button></center>



                        </div>





                        <input type="hidden" name="tipo_cliente" valur="1">

                      </form>



                    <?php endif ?>





                    <br>



                    <div class="box-body">

                      <table id="example1" class="table table-bordered table-striped">

                        <thead>

                          <tr>



                            <th class="text-center">Titulo </th>

                            <th class="text-center">Fecha </th>

                            <th class="text-center"> </th>



                          </tr>

                        </thead>

                        <tbody>

                          <?php



                          if ($connGlobal) {

                            $queryListhc = mysqli_query($connGlobal, "SELECT * from noticias where activo = 1");

                            if ($queryListhc) {





                              while ($rowhc = mysqli_fetch_array($queryListhc)) {



                                echo '      

                      <tr>

                      <td> ' . $rowhc['titulo'] . ' - ' . $rowhc['descripcion'] . '</td>

                      <td> ' . $rowhc['fecha'] . '</td>

                     

                      <td>



                      <form method>

                     

                      <font color="#04CC05"> <a href="../hmNoticias.php?idNoticia=' . $rowhc[id] . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>



                      </td>

                      </tr>';

                              }

                            }

                          }

                          ?>



                        </tbody>

                        <tfoot>

                          <tr>

                            <th class="text-center">nombre </th>

                            <th class="text-center">tabla </th>

                            <th class="text-center"> </th>



                          </tr>

                        </tfoot>

                      </table>

                    </div>





                    <script src="https://code.jquery.com/jquery-3.7.0.js"

                      integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

                    <script type="text/javascript">

                      function slugTitulo(value) {

                        console.log(value);

                        $.ajax({

                          url: "ajax_slug.php",

                          type: "POST",

                          data: {

                            value: value

                          },

                          success: function (data) {

                            console.log(data);

                            if (data == 0) {

                              // disponible

                              $('[type="submit"]').prop('disabled', false);

                              $('#mensajeSlug').html('Disponible');

                            } else {

                              // no disponible

                              $('[type="submit"]').prop('disabled', true);

                              $('#mensajeSlug').html('No disponible');

                            }

                          }

                        })

                      }

                    </script>



                    <script src="editorNuevo.js"></script>





                  </div>

                </div>























                <div class="tab-pane" id="formularioContactanos">



                  <h1> Mensajes de formularios </h1>



                  <div class="box-body">



                    <table id="example1" class="table table-bordered table-striped">

                      <thead>

                        <tr>

                          <th class="text-center">Fecha-Hora </th>



                          <th class="text-center">Nombre </th>

                          <th class="text-center">Teléfono </th>

                          <th class="text-center">Email </th>

                          <th class="text-center">Mensaje </th>





                          <th class="text-center"></th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php



                        $queryForumulario = mysqli_query($conn3, "SELECT * from c_contactanos ");

                        $nrowl = mysqli_num_rows($queryForumulario);

                        while ($rowFC = mysqli_fetch_array($queryForumulario)) {



                          $idP = $rowFC['id'];

                          $fechaP = $rowFC['fecha'];

                          $horaP = $rowFC['hora'];



                          $nombre = $rowFC['nombre'];

                          $apellido = $rowFC['apellido'];

                          $email = $rowFC['email'];

                          $telefono = $rowFC['telefono'];

                          $mensaje = $rowFC['mensaje'];

                          $estado = $rowFC['estado'];



                          $destacado = $rowFC['destacado'];



                          $cambiarEstado = base64_encode($idP);

                          if ($estado == 1) {

                            $buttonEstado = "<button title='Mensaje marcado como leído' onclick='marcarLeido(this, " . $idP . ")' class='btn btn-success btn-md btn-block rounded-pill'><i class='fas fa-check'></i></buton>";

                          } else {

                            $buttonEstado = "<button title='Marcar como leido' onclick='marcarLeido(this, " . $idP . ")' class='btn btn-info btn-md btn-block rounded-pill'><i class='fas fa-info'></i></buton>";

                          }





                          if ($destacado == 1) {

                            $buttonDestacado = "<button title='Mensaje destacado en sitio web' style='color:white' onclick='marcarDestacado(this, " . $idP . ")' class='btn btn-primary btn-md btn-block rounded-pill'><i class='fas fa-star'></i></buton>";

                          } else {

                            $buttonDestacado = "<button title='Destacar en sitio web' style='color:white' onclick='marcarDestacado(this, " . $idP . ")' class='btn btn-warning btn-md btn-block rounded-pill'><i class='fas fa-star'></i></buton>";

                          }









                          echo '      

          <tr>

          <td> ' . $fechaP . '-' . $horaP . '  </td>

          <td> ' . $nombre . ' ' . $apellido . '</td>

          <td> ' . $email . '  </td>

          <td> ' . $telefono . '  </td>

          <td> ' . $mensaje . '  </td>

          <td>' . $buttonEstado . $buttonDestacado . '</td> 



          <td>';

                          //                           if ($estado == 0) {

                        

                          //                             echo '<a href=anuncio?i=' . $cambiarEstado . '&e=1&ce=1> 

//           <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" > 

//          Marcar como Leído 

//           </button>

// </a>';

//                           } else {

//                             echo '';

//                           }

                        

                          //                           echo '

//           </td>

                          echo '</tr>';

                        }

                        ?>



                      </tbody>

                      <tfoot>

                        <tr>

                          <th class="text-center">Fecha-Hora </th>



                          <th class="text-center">Nombre </th>

                          <th class="text-center">Teléfono </th>

                          <th class="text-center">Email </th>

                          <th class="text-center">Mensaje </th>





                          <th class="text-center"></th>

                        </tr>

                      </tfoot>

                    </table>

                  </div>



                </div>































                <div class="tab-pane" id="Consultas7">



                  <form action="GuardarImagenesGaleria.php" class="col-md-12 row" method="POST"

                    name="formularioActualizarcliente" enctype="multipart/form-data">



                    <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id; ?>">

                    <input type="hidden" id="CODI_CLIENTE" name="CODI_CLIENTE" value="<?php echo $CODI_CLIENTE; ?>">

                    <input type="hidden" id="clienteid" name="clienteid" value="<?php echo $clienteId; ?>">













                    <h4 class="text-center">Galería de Imágenes - Sitio Web</h4>



                    <label class="col-md-12 control-label">Archivos</label>



                    <div class="col-md-6">

                      <label for="">Titulo</label>

                      <input type="text" maxlength="15" required class="form-control" name="titulo" id="titulo">

                    </div>



                    <div class="col-md-6">

                      <label for="">Descripcion</label>

                      <input type="text" maxlength="25" required class="form-control" name="descripcion"

                        id="descripcion">

                    </div>



                    <div class="col-md-12">

                      <small for=""> &nbsp; </small>

                      <input type="file" class="form-control" required name="archivo" id="archivo">

                      <!-- multiple="" -->

                    </div>







                    <button type="submit" class="btn btn-outline-success rounded-pill btn-lg m-2" style="width:100%"> <i

                        class="fa fa-save" aria-hidden="true"></i> Guardar</button>

                    <!-- <center><input type="submit" class="btn btn-outline-success btn-lg" value="Guardar"></center> -->



                    <input type="hidden" name="tipo_cliente" value="1">



                  </form>





                  <!-- <table width="100%" style=" border-top:1px solid #3c8dbc;" > -->

                  <table class="table">

                    <tr>

                      <th class="tg-c3ow">Nombre</th>

                      <th class="tg-0pky">Fecha</th>

                      <th></th>

                    </tr>



                    <?php //echo $Fecha;

                    

                    $ListaImg1 = mysqli_query($conn3, "SELECT * FROM c_galeriaImg where usuario_id = $ID "); ?>







                    <?php while ($resulImg = mysqli_fetch_assoc($ListaImg1)) { ?>





                      <tr style=" border-top:1px solid #3c8dbc;">

                        <th class="tg-c3ow">

                          <?php echo $resulImg['nombre_img']; ?>

                        </th>

                        <th>

                          <?php echo $resulImg['Fecha']; ?>

                        </th>

                        <th>

                          <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1"

                            data-toggle="modal" data-target="#modali<?php echo $resulImg['IM_id'] ?>">

                            <li class="fa fa-pencil"></li>

                          </button>

                        </th>

                      </tr>



                      <!-- Modal imagen -->

                      <div class="modal fade" id="modali<?php echo $resulImg['IM_id'] ?>" tabindex="-1" role="dialog"

                        aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen

                                <?php echo $resulImg['IM_id'] . '-' . $resulImg['nombre_img'] ?>

                              </h5>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <form action="GuardarImagenesGaleria.php" method="POST" enctype="multipart/form-data">

                              <div class="modal-body">

                                <div class="col-md-12">



                                  <div class="col-sm-12">

                                    <label class="control-label">Nombre del

                                      Vídeo</label>

                                    <input type="text" class="form-control" disabled name="descripcion"

                                      value="<?php echo $resulImg['nombre_img'] ?>" id="descripcion">

                                  </div>



                                  <div class="col-sm-12">

                                    <label class="control-label">Imagen</label>

                                    <div class="img img-responsive">

                                      <img class="img img-responsive"

                                        src="{$Base}/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>">

                                    </div>



                                    <hr>

                                  </div>

                                </div>

                              </div>

                              <div class="modal-footer">

                                <input type="hidden" name="IM_id" value="<?php echo $resulImg['IM_id'] ?>">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                <a class="btn btn-block btn-outline-info rounded-pill shadow m-1"

                                  href="{$Base}/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>"

                                  download="Archivo">Descargar Archivo

                                </a>

                                <button type="submit" name="submit" value="E" class="btn btn-danger">Eliminar</button>

                              </div>

                            </form>

                          </div>

                        </div>

                      </div>













                    <?php } ?>



                  </table>







                </div>



                <!-- ================ SECCION PARA USUARIOS WEB ==================== -->

                <div class="tab-pane" id="formularioUsuariosWeb">

                  <form action="web/actualizarUsuariosWeb.php" method="POST" enctype="multipart/form-data">

                    <div class="col-md-12">

                      <table class="table" id="" style="width:100%">

                        <thead>

                          <tr>

                            <th style="width: 10%">Usuario</th>

                            <th style="width: 40%">Foto de perfil [Ver]</th>

                            <th style="width: 30%">[Cargar]</th>

                            <th style="width: 20%">Activo para citas</th>

                          </tr>

                        </thead>

                        <tbody>

                          <?php

                          $query = "SELECT * FROM usuarios WHERE ACTIVO = 1 AND TIPO=99";

                          $queryUserMedicos = mysqli_query($conn3, $query);



                          $indice = 0;

                          foreach ($queryUserMedicos as $rowUsers) { ?>

                            <tr>

                              <td style="width: 10%"> <?= $rowUsers['NOMBRE_USUARIO'] ?> </td>

                              <td style="width: 40%">

                                <?php

                                if ($rowUsers['fotoMiniSitio'] <> "") {

                                  echo '<img src="' . $Base . 'web/fotosPerfilUsuariosWeb/' . $rowUsers['fotoMiniSitio'] . '" class="img-thumbnail rounded">';

                                } else {

                                  echo '<font color="blue">No se ha cargado una imagen</font>';

                                }



                                ?>

                              </td>

                              <td style="width: 30%"> <input type="file" name="arrayU[<?= $indice ?>][fotoMiniSitio]"

                                  class="form-control"></td>

                              <td style="width: 20%"> <label class="switch">

                                  <input type="checkbox" name="arrayU[<?= $indice ?>][activoCitasWeb]"

                                    <?= (($rowUsers['activoCitasWeb'] == 1) ? 'checked' : '') ?>>

                                  <span class="slider"></span>

                                </label>

                              </td>

                              <input type="hidden" name="arrayU[<?= $indice ?>][ID]" value="<?= $rowUsers['ID'] ?>"

                                value="1">

                            </tr>

                            <?php $indice += 1;

                          } ?>

                        </tbody>

                      </table>

                      <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">

                        <h4> Guardar </h4>

                      </button>

                    </div>

                  </form>

                </div>



                <!-- ================ SECCION PARA USUARIOS WEB ==================== -->





                <div class="tab-pane" id="Consultas8">



                  <form action="GuardarImagenesGaleriaVideo.php" method="POST" name="formularioActualizarcliente"

                    enctype="multipart/form-data">



                    <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id; ?>">

                    <input type="hidden" id="CODI_CLIENTE" name="CODI_CLIENTE" value="<?php echo $CODI_CLIENTE; ?>">

                    <input type="hidden" id="clienteid" name="clienteid" value="<?php echo $clienteId; ?>">



                    <h4 class="text-center">Cargar Vídeos</h4>





                    <div class="col-sm-12">

                      <label class="control-label">Nombre del Vídeo</label>

                      <input type="text" class="form-control" name="descripcion" id="descripcion">

                    </div>



                    <div class="col-sm-12">

                      <label class="control-label">Link del Vídeo - <a data-toggle="modal"

                          data-target="#modal-youtube">Como obtener enlace del vídeo</a>

                      </label>

                      <input type="text" class="form-control" name="archivo" id="archivo"

                        value="<?php echo htmlspecialchars($archivo) ?>">

                    </div>



                    <!-- Modal youtube -->

                    <div class="modal fade" id="modal-youtube" tabindex="-1" role="dialog"

                      aria-labelledby="exampleModalLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Como obtener

                              enlace

                              del vídeo</h5>

                          </div>

                          <div class="modal-body">

                            <h4 class="text-primary">1. En YouTube encuentra el video

                              relevante.

                            </h4>

                            <div class="img img-responsive center text-center" align="center">

                              <img class="w-100 img img-responsive" src="web/c_foto/yt/1.png">

                            </div>

                            <h4 class="text-primary">2. Haz clic en Compartir debajo del

                              video.

                            </h4>

                            <div class="img img-responsive center text-center" align="center">

                              <img class="w-100 img img-responsive" src="web/c_foto/yt/2.png">

                            </div>

                            <h4 class="text-primary">3. Clic en "Insertar".</h4>

                            <div class="img img-responsive center text-center" align="center">

                              <img class="w-100 img img-responsive" src="web/c_foto/yt/3.png">

                            </div>

                            <h4 class="text-primary">4. Copia el enlace.</h4>

                            <div class="img img-responsive center text-center" align="center">

                              <img class="w-100 img img-responsive" src="web/c_foto/yt/4.png">

                            </div>

                          </div>

                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                          </div>

                        </div>

                      </div>

                    </div>





                    <center><input type="submit" class="btn btn-outline-success" value="Guardar">

                    </center>



                    <input type="hidden" name="tipo_cliente" valur="1">



                  </form>





                  <table width="100%" style=" border-top:1px solid #3c8dbc;">

                    <tr>

                      <th class="tg-c3ow">Descripción</th>

                      <th class="tg-c3ow">Video</th>

                      <th class="tg-0pky">Fecha Publicado</th>

                      <th class="tg-0pky"></th>

                    </tr>



                    <?php //echo $Fecha;

                    

                    $ListaImg1 = mysqli_query($conn3, "SELECT * FROM c_galeriaVid  where usuario_id = $ID "); ?>







                    <?php while ($resulImg = mysqli_fetch_assoc($ListaImg1)) { ?>





                      <tr style=" border-top:1px solid #3c8dbc;">

                        <th class="">

                          <?php echo $resulImg['descripcion']; ?>

                        </th>

                        <th class="">

                          <?php echo $resulImg['nombre_vid']; ?>

                        </th>

                        <th>

                          <?php echo $resulImg['Fecha']; ?>

                        </th>

                        <th>

                          <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1"

                            data-toggle="modal" data-target="#exampleModal<?php echo $resulImg['IM_id'] ?>">

                            <li class="fa fa-pencil"></li>

                          </button>

                        </th>

                        <!--   <th>



                           <a target="blank" href="https://medicalsoftplus.com/baseDev/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>">

                            <a href="https://medicalsoftplus.com/baseDev/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>"download="Archivo">Descargar Archivo    

                            </a>  

                          </a>  



                        </th> -->

                        <!-- <th>

                          <a target="_blank" href="https://medicalsoftplus.com/baseDev/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>">

                            <a href="https://medicalsoftplus.com/baseDev/archivos/galeria/<?php echo $resulImg['nombre_img']; ?>">Ver Archivo o Imagen     <br>

                            </a>  

                          </a> 



                        </th> -->

                      </tr>



                      <!-- Modal video-->

                      <div class="modal fade" id="exampleModal<?php echo $resulImg['IM_id'] ?>" tabindex="-1"

                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">

                          <div class="modal-content">

                            <div class="modal-header">

                              <h5 class="modal-title" id="exampleModalLabel">Modificar Vídeo

                                <?php echo $resulImg['descripcion'] ?>

                              </h5>

                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                <span aria-hidden="true">&times;</span>

                              </button>

                            </div>

                            <form action="GuardarImagenesGaleriaVideo.php" method="POST" enctype="multipart/form-data">

                              <div class="modal-body">

                                <div class="col-md-12">



                                  <div class="col-sm-12">

                                    <label class="control-label">Nombre del

                                      Vídeo</label>

                                    <input type="text" class="form-control" name="descripcion"

                                      value="<?php echo $resulImg['descripcion'] ?>" id="descripcion">

                                  </div>



                                  <div class="col-sm-12">

                                    <label class="control-label">Link del Vídeo</label>

                                    <input type="text" class="form-control" name="archivo"

                                      value='<?php echo $resulImg['nombre_vid'] ?>' id="archivo">

                                    <hr>

                                  </div>

                                </div>

                              </div>

                              <div class="modal-footer">

                                <input type="hidden" name="IM_id" value="<?php echo $resulImg['IM_id'] ?>">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                <button type="submit" name="submit" value="E" class="btn btn-danger">Eliminar</button>

                                <button type="submit" name="submit" value="A"

                                  class="btn btn-block btn-outline-info rounded-pill shadow m-1">Actualizar</button>

                              </div>

                            </form>

                          </div>

                        </div>

                      </div>















                    <?php } ?>



                  </table>



                </div>



                <!--------------------------------------------------------------------------------------------------------->

                <!-- <div class="tab-pane" id="Consultas11">

                <form action="GuardarVideosGaleria.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">

                  <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id; ?>">

                  <input type="hidden" id="CODI_CLIENTE" name="CODI_CLIENTE" value="<?php echo $CODI_CLIENTE; ?>">

                  <input type="hidden" id="clienteid" name="clienteid" value="<?php echo $clienteId; ?>">



                  <h4 class="text-center">Subir Videos - Sitio Web</h4>



                  <div class="form-group">

                    <label for="archivo" class="col-sm-2 control-label">Archivos</label>

                    <div class="col-sm-10">

                      <input type="file" class="form-control-file" name="archivo" id="archivo" multiple>

                    </div>

                  </div>



                  <div class="text-center">

                    <input type="submit" class="btn btn-outline-success" value="Guardar">

                  </div>



                  <input type="hidden" name="tipo_cliente" value="1">

                </form>

 -->







                <!-- <table width="100%" style=" border-top:1px solid #3c8dbc;" > -->

                <!-- <table class="table">

                <tr>

                  <th class="tg-c3ow">Nombre</th>

                  <th class="tg-0pky">Fecha</th>

                  <th></th>

                </tr> -->



                <!-- <?php //echo $Fecha;

                

                $ListaImg1 = mysqli_query($conn3, "SELECT * FROM c_galeriaVideos where usuario_id = $ID "); ?>







                <?php while ($resulImg = mysqli_fetch_assoc($ListaImg1)) { ?> -->





                  <!-- <tr style=" border-top:1px solid #3c8dbc;">

                    <th class="tg-c3ow">

                      <?php echo $resulImg['nombre_img']; ?>

                    </th>

                    <th>

                      <?php echo $resulImg['Fecha']; ?>

                    </th>

                    <th>

                      <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" data-toggle="modal" data-target="#modali<?php echo $resulImg['IM_id'] ?>">

                        <li class="fa fa-pencil"></li>

                      </button>

                    </th>

                  </tr> -->



                  <!-- Modal imagen -->

                  <!-- <div class="modal fade" id="modali<?php echo $resulImg['IM_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Modificar Video <?php echo $resulImg['IM_id'] . '-' . $resulImg['nombre_img'] ?></h5>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <form action="GuardarVideosGaleria.php" method="POST" enctype="multipart/form-data">

                          <div class="modal-body">

                            <div class="col-md-12">



                              <div class="col-sm-12">

                                <label class="control-label">Nombre del Vídeo</label>

                                <input type="text" class="form-control" disabled name="descripcion" value="<?php echo $resulImg['nombre_img'] ?>" id="descripcion">

                              </div>



                              <div class="col-sm-12">

                                <label class="control-label">Imagen</label>

                                <div class="img img-responsive">

                                  <img class="img img-responsive" src="https://medicalsoftplus.com/baseDev/archivos/VideosWeb/<?php echo $resulImg['nombre_img']; ?>">

                                </div>



                                <hr>

                              </div>

                            </div>

                          </div>

                          <div class="modal-footer">

                            <input type="hidden" name="IM_id" value="<?php echo $resulImg['IM_id'] ?>">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            <a class="btn btn-block btn-outline-info rounded-pill shadow m-1" href="https://medicalsoftplus.com/baseDev/archivos/VideosWeb/<?php echo $resulImg['nombre_img']; ?>" download="Archivo">Descargar Archivo

                            </a>

                            <button type="submit" name="submit" value="E" class="btn btn-danger">Eliminar</button>

                          </div>

                        </form>

                      </div>

                    </div>

                  </div> -->













                  <!-- <?php } ?> -->



                <!-- </table>







            </div> -->



                <!--------------------------------------------------------------------------------------------------------->







                <div class="tab-pane" id="Consultas9">



                  <?php



                  // ultimos 7 dias de visitas

                  $queryList = mysqli_query($conn3, "SELECT count(id) as visitas,fecha,city,country from c_vistasDiarias where idUsuario=$ID 

                    and day(fecha) between day( curdate() ) -3 and day( curdate() ) +3 

                    group by fecha;");

                  $nrowl = mysqli_num_rows($queryList);

                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                    $seriesData .= "" . $rowMotorizado['visitas'] . ", ";

                    $categoriesData .= "'" . $rowMotorizado['fecha'] . "', ";

                  }

                  $seriesData = substr($seriesData, 0, -2);

                  $categoriesData = substr($categoriesData, 0, -2);



                  $queryList = mysqli_query($conn3, "SELECT count(id) as vistas from c_vistasDiarias;");

                  $nrowl = mysqli_num_rows($queryList);

                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                    $vistas = $rowMotorizado['vistas'];

                  }



                  ?>



                  <div class="col-md-12 mt-3 row">

                    <div class="col-md-4">

                      <h2 class="center text-center">Resumen de Visitas</h2>

                      <div class="card mb-3 widget-content bg-arielle-smile">

                        <div class="widget-content-wrapper text-white">

                          <div class="widget-content-left">

                            <div class="widget-heading">Visitas totales globales</div>

                            <div class="widget-subheading"></div>

                          </div>

                          <div class="widget-content-right">

                            <div class="widget-numbers text-white">

                              <span>

                                <?php echo $vistas ?>

                              </span>

                            </div>

                          </div>

                        </div>

                      </div>

                      <h4>Visitas por País</h4>

                      <ul class="list-group">

                        <?php

                        // total de visitas por pais

                        $queryList = mysqli_query($conn3, "SELECT count(id) as visitas,city,country from c_vistasDiarias where idUsuario=$ID 

                        group by country");

                        $nrowl = mysqli_num_rows($queryList);

                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                          $visitas = $rowMotorizado['visitas'];

                          $city = $rowMotorizado['city'];

                          $country = $rowMotorizado['country'];

                          echo '<li class="justify-content-between list-group-item">' . $country . '  <span class="badge badge-secondary badge-pill">' . $visitas . '</span></li>';

                        }

                        ?>

                      </ul>

                    </div>

                    <div class="col-md-8">

                      <h2 class="center text-center">Últimos 7 Días</h2>

                      <div id="chart-visitas"></div>

                    </div>

                  </div>

                </div>













                <!-- 

              <div class="tab-pane" id="Consultas11" >





<form action="c_anuncioActualizar.php" method="POST" enctype="multipart/form-data">

  <input type="hidden" class="form-control input-lg" name="usuarioId" value="<?php echo $ID ?>">

  <input type="hidden" class="form-control input-lg" name="form4" value="1">

  <div class="form-row">









   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



    <div align="left"> <h3> Imagen 1 </h3>  </div>

    <div align="left"> <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se permite archivos .png </font></div>

    <input type="file" class="form-control input-lg"  name="imagen6">

    <?php



    // echo strlen($logoF);

    if (strlen($foto6) > 1) {

      echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto6 . '">';

      //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

      //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

      //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

    } else {

      echo 'Imagen No Cargada';

    }

    ?>



 </div>



 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">



  <div align="left"> <h3> Imagen 2 </h3>  </div>

  <div align="left"> <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se permite archivos .png </font></div>

  <input type="file" class="form-control input-lg"  name="imagen7">

  <?php



  // echo strlen($logoF);

  if (strlen($foto7) > 1) {

    echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto7 . '">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

  } else {

    echo 'Imagen No Cargada';

  }

  ?>



</div>

<div class="col-lg- col-md-12 col-sm-12 col-xs-12">









  <div align="left"> <h3> Imagen 3 </h3>  </div>

  <div align="left"> <font color="red" size="1"> Tamaño sugerido 500px/500px, solo se permite archivos .png </font></div>

  <input type="file" class="form-control input-lg"  name="imagen8">

  <?php



  // echo strlen($logoF);

  if (strlen($foto8) > 1) {

    echo '<img class="img img-responsive w-100" src="' . $Base . 'c_foto/' . $foto8 . '" width="100%">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

    //echo '<img src="'.$Base.'/c_foto/'.$foto.'">';

  } else {

    echo 'Imagen No Cargada';

  }

  ?>



</div>



 -->







                <!-- <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" id="registro_usuario" name="registro_usuario"><h4> Actualizar </h4></button> -->



              </div>



              </form>













            </div>





















          </div>













          <!-- /.tab-pane -->



          <!-- /.tab-pane -->

        </div>

        <!-- /.tab-content -->

      </div>

    </div>

    <!-- /.nav-tabs-custom -->

</div>





<!-- /.col -->

</div>

<!-- /.row -->

</section>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php

include 'footer.php';

?>





<script type="text/javascript">

  function disponibilidad() {

    // estas son las variables que enviamos



    var direccionWeb = $("#direccionWeb").val();



    // aqui enviamos el mensaje por medio de un arreglo     



    $.ajax({

      type: "POST",

      url: "c_ajax_disponibilidad.php",

      data: {

        direccionWeb: direccionWeb

      },

      success: function (response) {

        $('#div-disponibilidad').html(response);



      }

    });

  };

</script>

<script type="text/javascript">

  var options = {

    chart: {

      type: 'area',

      height: '300px'

    },

    series: [{

      name: 'Visitas',

      data: [<?php echo $seriesData; ?>]

    }],

    xaxis: {

      categories: [<?php echo $categoriesData; ?>]

    }

  }



  var chart = new ApexCharts(document.querySelector("#chart-visitas"), options);



  chart.render();

</script>





<script type="text/javascript">

  var Incremento = 0;

  $("#Enviar").click(function (event) {

    Incremento++;

    //Validando

    if ($("#Nomb").val() == "") {

      $("#loader").html("<strong style='color:red;'>Error escriba el nombe del Dominio</strong>");

    } else {

      $("#loader").html("<img src='indicator.gif'>");

      $.ajax({

        url: '../buscador.php',

        type: 'POST',

        dataType: 'text',

        data: {

          Nomb: $("#Nomb").val(),

          "Ext": '.com',

          "Incremento": Incremento

        },

      })

        .done(function (data) {

          $("#loader").html("");

          $("#Mostrar").append(data);

        })

        .fail(function () {

          console.log("error");

        })

        .always(function () {

          console.log("complete");

        });

    }

  });

</script>

<script>

  $(document).ready(function () {

    $('#tablaUsers').DataTable();

  });



  function marcarLeido(elemento, idMsg) {

    $.ajax({

      url: "ajax_c_anuncio.php",

      type: "POST",

      data: {

        idMsg,

        tipo: "Cambiar_Leido_Msg"

      },

      success: function (data) {

        var dataJson = JSON.parse(data);

        if (dataJson.estadoActual == 1) {

          elemento.classList.remove("btn-info");

          elemento.classList.add("btn-success");

          elemento.innerHTML = "<i class='fas fa-check'></i>";

          elemento.title = "Mensaje marcado como leído";

        } else if (dataJson.estadoActual == 0) {

          elemento.classList.remove("btn-success");

          elemento.classList.add("btn-info");

          elemento.innerHTML = "<i class='fas fa-info'></i>";

          elemento.title = "Marcar como leído";

        }

      }

    })

  }

  function marcarDestacado(elemento, idMsg) {

    $.ajax({

      url: "ajax_c_anuncio.php",

      type: "POST",

      data: {

        idMsg,

        tipo: "Cambiar_Destacado_Msg"

      },

      success: function (data) {

        var dataJson = JSON.parse(data);

        if (dataJson.estadoActual == 1) {

          elemento.classList.remove("btn-warning");

          elemento.classList.add("btn-primary");

          elemento.title = "Mensaje destacado en mini sitio web";

        } else if (dataJson.estadoActual == 0) {

          elemento.classList.remove("btn-primary");

          elemento.classList.add("btn-warning");

          elemento.title = "Marcar como destacado en sitio web";

        }

      }

    })

  }





</script>