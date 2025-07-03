<?php 
//include 'header.php';
$clienteId = $_GET['clienteId'];



?>
<?php 
//include 'menu.php'
?>
<!--
<body>
  <div class="content-wrapper">
   
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
      </ol>
    </section>



<br>
<br>

-->
 
<section class="content">


<?php



 
      $query_ap = mysqli_query($conn3, "SELECT * FROM odontogramaMasterHistoria WHERE idCliente = $clienteId");
      $nrowl = mysqli_num_rows($query_ap);
      while ($row_alp = mysqli_fetch_array($query_ap)) {
        $o18 = explode(",", $row_alp['o18']);
        $o17 = explode(",", $row_alp['o17']);
        $o16 = explode(",", $row_alp['o16']);
        $o15 = explode(",", $row_alp['o15']);
        $o14 = explode(",", $row_alp['o14']);
        $o13 = explode(",", $row_alp['o13']);
        $o12 = explode(",", $row_alp['o12']);
        $o11 = explode(",", $row_alp['o11']);

        $o21 = explode(",", $row_alp['o21']);
        $o22 = explode(",", $row_alp['o22']);
        $o23 = explode(",", $row_alp['o23']);
        $o24 = explode(",", $row_alp['o24']);
        $o25 = explode(",", $row_alp['o25']);
        $o26 = explode(",", $row_alp['o26']);
        $o27 = explode(",", $row_alp['o27']);
        $o28 = explode(",", $row_alp['o28']);

        $o55 = explode(",", $row_alp['o55']);
        $o54 = explode(",", $row_alp['o54']);
        $o53 = explode(",", $row_alp['o53']);
        $o52 = explode(",", $row_alp['o52']);
        $o51 = explode(",", $row_alp['o51']);

        $o65 = explode(",", $row_alp['o65']);
        $o64 = explode(",", $row_alp['o64']);
        $o63 = explode(",", $row_alp['o63']);
        $o62 = explode(",", $row_alp['o62']);
        $o61 = explode(",", $row_alp['o61']);

        $o48 = explode(",", $row_alp['o48']);
        $o47 = explode(",", $row_alp['o47']);
        $o46 = explode(",", $row_alp['o46']);
        $o45 = explode(",", $row_alp['o45']);
        $o44 = explode(",", $row_alp['o44']);
        $o43 = explode(",", $row_alp['o43']);
        $o42 = explode(",", $row_alp['o42']);
        $o41 = explode(",", $row_alp['o41']);

        $o31 = explode(",", $row_alp['o31']);
        $o32 = explode(",", $row_alp['o32']);
        $o33 = explode(",", $row_alp['o33']);
        $o34 = explode(",", $row_alp['o34']);
        $o35 = explode(",", $row_alp['o35']);
        $o36 = explode(",", $row_alp['o36']);
        $o37 = explode(",", $row_alp['o37']);
        $o38 = explode(",", $row_alp['o38']);

        $o85 = explode(",", $row_alp['o85']);
        $o84 = explode(",", $row_alp['o84']);
        $o83 = explode(",", $row_alp['o83']);
        $o82 = explode(",", $row_alp['o82']);
        $o81 = explode(",", $row_alp['o81']);

        $o75 = explode(",", $row_alp['o75']);
        $o74 = explode(",", $row_alp['o74']);
        $o73 = explode(",", $row_alp['o73']);
        $o72 = explode(",", $row_alp['o72']);
        $o71 = explode(",", $row_alp['o71']);
      }








      ?>


      <input type="hidden" id="idCliente" value="<?php echo $clienteId ?>">
      <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['ID'] ?>">



   
      <table border="0" width="100%">

        <tbody>
          <tr>
            <td align="center">

              18 <br>
              <a href="#" onclick="cargarparte18()">
                <input type="hidden" id="parte18" value="18">

                <!-- <img src="Odontograma/oG<?php echo $o18[0] ?>/18.png">-->
                <?php   
                  $carpeta = $o18[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/18.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/18.png">';
                  } ?> 
              </a>


              <style>
                th,
                .fu {
                  text-align: center;
                }
              </style>

              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o18[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o18[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th bgcolor="<?php echo funcionMaster($o18[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;  width: 10%;"><a href="#" onclick="cargarparte18('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o18[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th bgcolor="<?php echo funcionMaster($o18[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o18[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th bgcolor="<?php echo funcionMaster($o18[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o18[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>

                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o18[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;  width: 10%;"><a href="#" onclick="cargarparte18('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position:relative;left:5px; color:<?php echo funcionMaster($o18[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estados de la placa del diente 18
              if ($EstadoPlaca == $o18[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o18[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o18[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o18[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o18[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 18

              if ($estadoAusente == $o18[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">
              17 <br>
              <a href="#" onclick="cargarparte17()">
                <input type="hidden" id="parte17" value="17">
               <?php   
                  $carpeta = $o17[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/17.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/17.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o17[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte17('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o17[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o17[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte17('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o17[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o17[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte17('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o17[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o17[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte17('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o17[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o17[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte17('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o17[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 17
              if ($EstadoPlaca == $o17[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o17[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o17[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o17[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o17[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 17
              if ($estadoAusente == $o17[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">

              16 <br>
              <a href="#" onclick="cargarparte16()">
                <input type="hidden" id="parte16" value="16">
               <?php   
                  $carpeta = $o16[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/16.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/16.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o16[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte16('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o16[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o16[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte16('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o16[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></td>
                    <td bgcolor="<?php echo funcionMaster($o16[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte16('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 2px; color:<?php echo funcionMaster($o16[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></td>
                    <td bgcolor="<?php echo funcionMaster($o16[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte16('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o16[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o16[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte16('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 2px; color:<?php echo funcionMaster($o16[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 16
              if ($EstadoPlaca == $o16[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o16[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o16[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o16[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o16[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 16
              if ($estadoAusente == $o16[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">15 <br>
              <a href="#" onclick="cargarparte15()">
                <input type="hidden" id="parte15" value="15">
                <?php   
                  $carpeta = $o15[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/15.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/15.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o15[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte15('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o15[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o15[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte15('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o15[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o15[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte15('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o15[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o15[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte15('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o15[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o15[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte15('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o15[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td align="center">


              <?php
              //estado de la placa 15
              if ($EstadoPlaca == $o15[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o15[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o15[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o15[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o15[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 18
              if ($estadoAusente == $o15[0]) {
                $Ausente++;
              } 

              /*else if ($estadoAusente == $o15[2]) {
                $Ausente++;
              } else if ($estadoAusente == $o15[3]) {
                $Ausente++;
              } else if ($estadoAusente == $o15[4]) {
                $Ausente++;
              } else if ($estadoAusente == $o15[5]) {
                $Ausente++;
              } */

              ?>

              14 <br>
              <a href="#" onclick="cargarparte14()">
                <input type="hidden" id="parte14" value="14">
              <?php   
                  $carpeta = $o14[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/14.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/14.png">';
                  } ?>

              </a>





              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o14[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte14('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o14[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o14[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte14('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o14[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o14[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte14('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o14[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o14[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte14('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o14[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o14[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte14('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o14[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 14
              if ($EstadoPlaca == $o14[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o14[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o14[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o14[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o14[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 14
              if ($estadoAusente == $o14[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">13 <br>
              <a href="#" onclick="cargarparte13()">
                <input type="hidden" id="parte13" value="13">
               <?php   
                  $carpeta = $o13[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/13.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/13.png">';
                  } ?>

              </a>





              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o13[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte13('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o13[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o13[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte13('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o13[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o13[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte13('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 5px; color:<?php echo funcionMaster($o13[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o13[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte13('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o13[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o13[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte13('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative;left: 5px; color:<?php echo funcionMaster($o13[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 13
              if ($EstadoPlaca == $o13[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o13[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o13[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o13[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o13[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 13
              if ($estadoAusente == $o13[0]) {
                $Ausente++; }
           /*   } else if ($estadoAusente == $o13[2]) {
                $Ausente++;
              } else if ($estadoAusente == $o13[3]) {
                $Ausente++;
              } else if ($estadoAusente == $o13[4]) {
                $Ausente++;
              } else if ($estadoAusente == $o13[5]) {
                $Ausente++;
              } */

              ?>
            </td>
            <td align="center">12 <br>
              <a href="#" onclick="cargarparte12()">
                <input type="hidden" id="parte12" value="12">
               <?php   
                  $carpeta = $o12[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/12.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/12.png">';
                  } ?>

              </a>



              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o12[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte12('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o12[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o12[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte12('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o12[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o12[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte12('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative;left: 2px; color:<?php echo funcionMaster($o12[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o12[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte12('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o12[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o12[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte12('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 2px; color:<?php echo funcionMaster($o12[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>

                <?php
                //estado de la placa 12
                if ($EstadoPlaca == $o12[1]) {
                  $piezaPLaca++;
                } else if ($EstadoPlaca == $o12[2]) {
                  $piezaPLaca++;
                } else if ($EstadoPlaca == $o12[3]) {
                  $piezaPLaca++;
                } else if ($EstadoPlaca == $o12[4]) {
                  $piezaPLaca++;
                } else if ($EstadoPlaca == $o12[5]) {
                  $piezaPLaca++;
                }
                //estados ausentes del diente 12
                if ($estadoAusente == $o12[0]) {
                  $Ausente++;
                }

                ?>
              </table>
            </td>

            <td align="center">11 <br>
              <a href="#" onclick="cargarparte11()">
                <input type="hidden" id="parte11" value="11">
               <?php   
                  $carpeta = $o11[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/11.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/11.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o11[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte11('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o11[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o11[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte11('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o11[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o11[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte11('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o11[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o11[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte11('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o11[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>

                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o11[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte11('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative;left: 2px; color:<?php echo funcionMaster($o11[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
            </td>

            <?php
            //estado de la placa 11
            if ($EstadoPlaca == $o11[1]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o11[2]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o11[3]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o11[4]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o11[5]) {
              $piezaPLaca++;
            }
            //estados ausentes del diente 11
            if ($estadoAusente == $o11[0]) {
              $Ausente++;
            }

            ?>

            <td align="center">

              21 <br>
              <a href="#" onclick="cargarparte21()">
                <input type="hidden" id="parte21" value="21">
               <?php   
                  $carpeta = $o21[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/21.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/21.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o21[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte21('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o21[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o21[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte21('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o21[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o21[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte21('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style="position: relative; left: 2px; color:<?php echo funcionMaster($o21[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o21[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte21('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o21[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o21[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte21('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o21[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
            </td>
            <?php
            //estado de la placa 21
            if ($EstadoPlaca == $o21[0]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o21[1]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o21[2]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o21[3]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o21[4]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o21[5]) {
              $piezaPLaca++;
            }
            //estados ausentes del diente 21
            if ($estadoAusente == $o21[0]) {
              $Ausente++;
            }

            ?>

            <td align="center">22 <br>
              <a href="#" onclick="cargarparte22()">
                <input type="hidden" id="parte22" value="22">
              <?php   
                  $carpeta = $o22[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/22.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/22.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o22[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte22('1')" data-toggle="modal"> <i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o22[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o22[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte22('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o22[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o22[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte22('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o22[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o22[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte22('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o22[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center" style="background: transparent !important;">
                      </th>
                    <td bgcolor="<?php echo funcionMaster($o22[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte22('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o22[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center" style="background: transparent !important;">
                      </th>
                  </tr>
                </tbody>
              </table>
            </td>

            <?php
            //estado de la placa 22
            if ($EstadoPlaca == $o22[1]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o22[2]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o22[3]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o22[4]) {
              $piezaPLaca++;
            } else if ($EstadoPlaca == $o22[5]) {
              $piezaPLaca++;
            }
            //estados ausentes del diente 22
            if ($estadoAusente == $o22[0]) {
              $Ausente++;
            }

            ?>
            <td align="center">

              23 <br>
              <a href="#" onclick="cargarparte23()">
                <input type="hidden" id="parte23" value="23">
              <?php   
                  $carpeta = $o23[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/23.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/23.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                    <tr>
                  <th style="background: transparent !important;"></th>
                  <th bgcolor="<?php echo funcionMaster($o23[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte23('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style="color:<?php echo funcionMaster($o23[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                  <th style="background: transparent !important;"></th>

</tr>





                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o23[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte23('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o23[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o23[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte23('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o23[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o23[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte23('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o23[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o23[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte23('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" position: relative; left: 2px; color:<?php echo funcionMaster($o23[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 23
              if ($EstadoPlaca == $o23[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o23[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o23[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o23[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o23[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o23[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 23
              if ($estadoAusente == $o23[0]) {
                $Ausente++;
              }

              ?>
            </td>
            <td align="center">24 <br>
              <a href="#" onclick="cargarparte24()">
                <input type="hidden" id="parte24" value="24">
               <?php   
                  $carpeta = $o24[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/24.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/24.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o24[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte24('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o24[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o24[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte24('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o24[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o24[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte24('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o24[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o24[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte24('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o24[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o24[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte24('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o24[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 24
              if ($EstadoPlaca == $o24[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o24[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o24[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o24[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o24[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o24[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 24
              if ($estadoAusente == $o24[0]) {
                $Ausente++;
              }


              ?>
            </td>
            <td align="center">

              25 <br>
              <a href="#" onclick="cargarparte25()">
                <input type="hidden" id="parte25" value="25">
                <?php   
                  $carpeta = $o25[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/25.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/25.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o25[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte25('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o25[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte25('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>


                    <td bgcolor="<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte25('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>

                    <!--   <td bgcolor="<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;">   <img src="https://medicalsoftplus.com/hn439/galeriaImg/cir.png" height="10%" width="10%"> <i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a> </td> -->

                    <td bgcolor="<?php echo funcionMaster($o25[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte25('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o25[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte25('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o25[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
              <?php
              //estado de la placa 25
              if ($EstadoPlaca == $o25[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o25[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o25[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o25[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o25[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 25
              if ($estadoAusente == $o25[0]) {
                $Ausente++;
              }

              ?>
            </td>


            <td align="center">26 <br>
              <a href="#" onclick="cargarparte26()">
                <input type="hidden" id="parte26" value="26">
              <?php   
                  $carpeta = $o26[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/26.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/26.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o26[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte26('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o26[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o26[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte26('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o26[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o26[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte26('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o26[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td bgcolor="<?php echo funcionMaster($o26[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte26('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o26[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o26[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte26('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o26[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 26

              if ($EstadoPlaca == $o26[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o26[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o26[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o26[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o26[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 26
              if ($estadoAusente == $o26[0]) {
                $Ausente++;
              }

              ?>
            </td>
            <td align="center">27 <br>
              <a href="#" onclick="cargarparte27()">
                <input type="hidden" id="parte27" value="27">
                <?php   
                  $carpeta = $o27[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/27.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/27.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o27[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte27('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o27[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o27[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte27('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o27[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o27[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte27('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o27[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o27[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte27('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o27[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o27[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte27('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o27[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
              <?php
              //estado de la placa 27

              if ($EstadoPlaca == $o27[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o27[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o27[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o27[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o27[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 27
              if ($estadoAusente == $o27[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">

              28 <br>
              <a href="#" onclick="cargarparte28()">
                <input type="hidden" id="parte28" value="28">
             <?php   
                  $carpeta = $o28[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/28.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/28.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o28[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte28('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o28[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o28[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte28('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o28[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o28[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte28('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o28[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o28[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte28('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o28[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o28[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte28('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o28[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>












              <?php
              //estado de la placa 28
              if ($EstadoPlaca == $o28[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o28[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o28[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o28[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o28[5]) {
                $piezaPLaca++;
              }


              //estados ausentes del diente 28
              if ($estadoAusente == $o28[0]) {
                $Ausente++;
              }
              ?>

            </td>
          </tr>

          <tr>
            <td colspan="3" rowspan="2"></td>
            <td align="center">



              55 <br>
              <a href="#" onclick="cargarparte55()">
                <input type="hidden" id="parte55" value="55">
              <?php   
                  $carpeta = $o55[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/55.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/55.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o55[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte55('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o55[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o55[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte55('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o55[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o55[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte55('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o55[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o55[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte55('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o55[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o55[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte55('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o55[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>
              <?php
              //estado de la placa 55
              if ($EstadoPlaca == $o55[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o55[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o55[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o55[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o55[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 55
              if ($estadoAusente == $o55[0]) {
                $Ausente++;
              }

              ?>





            </td>
            <td align="center">


              54 <br>
              <a href="#" onclick="cargarparte54()">
                <input type="hidden" id="parte54" value="54">
               <?php   
                  $carpeta = $o54[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/54.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/54.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o54[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte54('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o54[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o54[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte54('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o54[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o54[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte54('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o54[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o54[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte54('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o54[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o54[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte54('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o54[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 54
              if ($EstadoPlaca == $o54[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o54[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o54[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o54[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o54[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o54[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 54
              if ($estadoAusente == $o54[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">



              53 <br>
              <a href="#" onclick="cargarparte53()">
                <input type="hidden" id="parte53" value="53">
               <?php   
                  $carpeta = $o53[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/53.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/53.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o53[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte53('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o53[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o53[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte53('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o53[2], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o53[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte53('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o53[3], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o53[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte53('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o53[4], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o53[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte53('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o53[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 53
              if ($EstadoPlaca == $o53[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o53[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o53[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o53[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o53[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o53[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 53
              if ($estadoAusente == $o53[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">

              52 <br>
              <a href="#" onclick="cargarparte52()">
                <input type="hidden" id="parte52" value="52">
               <?php   
                  $carpeta = $o52[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/52.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/52.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o52[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte52('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o52[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o52[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte52('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o52[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o52[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte52('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o52[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o52[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte52('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o52[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o52[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte52('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o52[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 52
              if ($EstadoPlaca == $o52[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o52[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o52[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o52[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o52[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 52
              if ($estadoAusente == $o52[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">



              51 <br>
              <a href="#" onclick="cargarparte51()">
                <input type="hidden" id="parte51" value="51">
               <?php   
                  $carpeta = $o51[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/51.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/51.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o51[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte51('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o51[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o51[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte51('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o51[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o51[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte51('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color: <?php echo funcionMaster($o51[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o51[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte51('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o51[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o51[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte51('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color: <?php echo funcionMaster($o51[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 52
              if ($EstadoPlaca == $o51[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o51[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o51[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o51[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o51[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 52
              if ($estadoAusente == $o51[0]) {
                $Ausente++;
              }

              ?>






            </td>
            <td align="center">



              61 <br>
              <a href="#" onclick="cargarparte61()">
                <input type="hidden" id="parte61" value="61">
                <?php   
                  $carpeta = $o61[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/61.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/61.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o61[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte61('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o61[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o61[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte61('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o61[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o61[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte61('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o61[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o61[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte61('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o61[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o61[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte61('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o61[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 61
              if ($EstadoPlaca == $o61[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o61[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o61[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o61[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o61[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o61[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 61
              if ($estadoAusente == $o61[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">



              62 <br>
              <a href="#" onclick="cargarparte62()">
                <input type="hidden" id="parte62" value="62">
               <?php   
                  $carpeta = $o62[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/62.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/62.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o62[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte62('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o62[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o62[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte62('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o62[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o62[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte62('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o62[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o62[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte62('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o62[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o62[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte62('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o62[5], 'id', 'color', 'OdontogramaEstados'); ?>"">&nbsp;</i></a></td>
    <td align=" center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 62
              if ($EstadoPlaca == $o62[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o62[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o62[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o62[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o62[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o62[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 62
              if ($estadoAusente == $o62[0]) {
                $Ausente++;
              }
              ?>



            </td>
            <td align="center">




              63 <br>
              <a href="#" onclick="cargarparte63()">
                <input type="hidden" id="parte63" value="63">
              <?php   
                  $carpeta = $o63[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/63.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/63.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o63[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte63('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o63[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o63[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte63('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o63[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o63[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte63('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o63[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o63[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte63('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o63[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o63[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte63('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o63[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 63
              if ($EstadoPlaca == $o63[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o63[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o63[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o63[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o63[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o63[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 63
              if ($estadoAusente == $o63[0]) {
                $Ausente++;
              }
              ?>


            </td>
            <td align="center">




              64 <br>
              <a href="#" onclick="cargarparte64()">
                <input type="hidden" id="parte64" value="64">
                <?php   
                  $carpeta = $o64[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/64.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/64.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o64[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte64('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o64[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o64[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte64('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o64[2], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o64[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte64('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o64[3], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o64[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte64('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o64[4], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o64[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte64('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o64[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 64
              if ($EstadoPlaca == $o64[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o64[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o64[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o64[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o64[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o64[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 64
              if ($estadoAusente == $o64[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              65 <br>
              <a href="#" onclick="cargarparte65()">
                <input type="hidden" id="parte65" value="65">
                <?php   
                  $carpeta = $o65[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/65.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/65.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o65[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte65('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o65[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o65[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte65('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o65[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o65[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte65('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o65[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o65[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte65('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o65[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o65[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte65('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o65[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

            <td colspan="3" rowspan="2"></td>
      </table>

      <?php
      //estado de la placa 65
      if ($EstadoPlaca == $o65[1]) {
        $piezaPLaca++;
      } else if ($EstadoPlaca == $o65[2]) {
        $piezaPLaca++;
      } else if ($EstadoPlaca == $o65[3]) {
        $piezaPLaca++;
      } else if ($EstadoPlaca == $o65[4]) {
        $piezaPLaca++;
      } else if ($EstadoPlaca == $o65[5]) {
        $piezaPLaca++;
      }
      //estados ausentes del diente 65
      if ($estadoAusente == $o65[0]) {
        $Ausente++;
      }

      ?>








      <strong> Historia </strong> <br>
      <div id="cargarHistoriaDetalle"></div>
      <div id="cargarHistoria"></div>




      <table border="0" width="100%">

        <tbody>

          <td colspan="3" rowspan="2"></td>
          <tr>
            <td align="center">



              85 <br>
              <a href="#" onclick="cargarparte85()">
                <input type="hidden" id="parte85" value="85">
               <?php   
                  $carpeta = $o85[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/85.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/85.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o85[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte85('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o85[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o85[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte85('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o85[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o85[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte85('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o85[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o85[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte85('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o85[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o85[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte85('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o85[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 85
              if ($EstadoPlaca == $o85[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o85[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o85[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o85[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o85[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o85[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 18
              if ($estadoAusente == $o85[0]) {
                $Ausente++;
              }

              ?>




            </td>
            <td align="center">



              84 <br>
              <a href="#" onclick="cargarparte84()">
                <input type="hidden" id="parte84" value="84">
               <?php   
                  $carpeta = $o84[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/84.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/84.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o84[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte84('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o84[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o84[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte84('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o84[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o84[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte84('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o84[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o84[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte84('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o84[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o84[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte84('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o84[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 84
              if ($EstadoPlaca == $o84[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o84[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o84[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o84[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o84[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o84[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 84
              if ($estadoAusente == $o84[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">




              83 <br>
              <a href="#" onclick="cargarparte83()">
                <input type="hidden" id="parte83" value="83">
               <?php   
                  $carpeta = $o83[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/83.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/83.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o83[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte83('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o83[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o83[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte83('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o83[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o83[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte83('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o83[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o83[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte83('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o83[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o83[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte83('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o83[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>





            </td>
            <td align="center">

              <?php
              //estado de la placa 85
              if ($EstadoPlaca == $o83[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o83[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o83[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o83[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o83[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 83
              if ($estadoAusente == $o83[0]) {
                $Ausente++;
              }

              ?>


              82 <br>
              <a href="#" onclick="cargarparte82()">
                <input type="hidden" id="parte82" value="82">
               <?php   
                  $carpeta = $o82[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/82.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/82.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o82[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte82('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o82[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o82[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte82('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o82[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o82[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte82('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o82[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o82[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte82('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o82[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o82[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte82('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o82[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 82
              if ($EstadoPlaca == $o82[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o82[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o82[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o82[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o82[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o82[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 82
              if ($estadoAusente == $o82[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">



              81 <br>
              <a href="#" onclick="cargarparte81()">
                <input type="hidden" id="parte81" value="81">
             <?php   
                  $carpeta = $o81[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/81.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/81.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o81[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte81('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o81[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o81[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte81('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o81[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o81[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte81('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o81[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o81[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte81('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o81[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o81[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte81('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o81[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 81
              if ($EstadoPlaca == $o81[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o81[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o81[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o81[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o81[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o81[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 81
              if ($estadoAusente == $o81[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">

              71 <br>
              <a href="#" onclick="cargarparte71()">
                <input type="hidden" id="parte71" value="71">
               <?php   
                  $carpeta = $o71[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/71.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/71.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o71[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte71('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o71[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o71[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte71('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o71[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o71[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte71('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o71[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o71[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte71('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o71[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o71[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte71('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o71[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 71
              if ($EstadoPlaca == $o71[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o71[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o71[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o71[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o71[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 71
              if ($estadoAusente == $o71[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">


              72 <br>
              <a href="#" onclick="cargarparte72()">
                <input type="hidden" id="parte72" value="72">
                <?php   
                  $carpeta = $o72[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/72.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/72.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o72[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte72('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o72[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o72[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte72('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o72[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o72[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte72('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o72[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o72[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte72('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o72[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o72[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte72('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o72[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 72
              if ($EstadoPlaca == $o72[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o72[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o72[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o72[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o72[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o72[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 72
              if ($estadoAusente == $o72[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              73 <br>
              <a href="#" onclick="cargarparte73()">
                <input type="hidden" id="parte73" value="73">
               <?php   
                  $carpeta = $o73[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/73.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/73.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o73[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte73('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o73[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o73[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte73('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o73[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o73[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte73('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o73[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o73[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte73('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o73[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o73[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte73('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o73[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 73
              if ($EstadoPlaca == $o73[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o73[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o73[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o73[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o73[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 18
              if ($estadoAusente == $o73[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              74 <br>
              <a href="#" onclick="cargarparte74()">
                <input type="hidden" id="parte74" value="74">
               <?php   
                  $carpeta = $o74[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/74.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/74.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o74[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte74('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o74[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o74[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte74('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o74[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o74[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte74('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o74[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o74[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte74('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o74[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o74[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte74('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o74[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 74
              if ($EstadoPlaca == $o74[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o74[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o74[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o74[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o74[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o74[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 74
              if ($estadoAusente == $o74[0]) {
                $Ausente++;
              }
              ?>

            </td>
            <td align="center">



              75 <br>
              <a href="#" onclick="cargarparte75()">
                <input type="hidden" id="parte75" value="75">
                <?php   
                  $carpeta = $o75[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/75.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/75.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>

                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o75[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte75('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o75[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o75[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte75('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o75[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o75[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte75('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o75[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o75[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte75('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o75[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o75[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte75('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o75[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>

                </tbody>

              </table>

            </td>

          </tr>

          <tr>
            <td align="center">
              <?php
              //estado de la placa 75
              if ($EstadoPlaca == $o75[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o75[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o75[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o75[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o75[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 18
              if ($estadoAusente == $o75[0]) {
                $Ausente++;
              }

              ?>


              48 <br>
              <a href="#" onclick="cargarparte48()">
                <input type="hidden" id="parte48" value="48">
              <?php   
                  $carpeta = $o48[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/48.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/48.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o48[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte48('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o48[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o48[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte48('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o48[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o48[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte48('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o48[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o48[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte48('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o48[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o48[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte48('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o48[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>





              <?php
              //estado de la placa 48
              if ($EstadoPlaca == $o48[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o48[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o48[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o48[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o48[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 48
              if ($estadoAusente == $o48[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">



              47 <br>
              <a href="#" onclick="cargarparte47()">
                <input type="hidden" id="parte47" value="47">
              <?php   
                  $carpeta = $o47[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/47.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/47.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o47[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte47('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o47[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o47[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte47('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o47[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o47[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte47('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o47[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o47[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte47('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o47[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o47[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte47('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o47[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 47
              if ($EstadoPlaca == $o47[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o47[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o47[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o47[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o47[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 47
              if ($estadoAusente == $o47[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">


              46 <br>
              <a href="#" onclick="cargarparte46()">
                <input type="hidden" id="parte46" value="46">
             <?php   
                  $carpeta = $o46[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/46.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/46.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o46[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte46('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o46[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o46[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte46('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o46[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o46[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte46('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o46[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o46[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte46('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o46[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o46[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte46('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o46[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 46
              if ($EstadoPlaca == $o46[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o46[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o46[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o46[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o46[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 46
              if ($estadoAusente == $o46[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">


              45 <br>
              <a href="#" onclick="cargarparte45()">
                <input type="hidden" id="parte45" value="45">
               <?php   
                  $carpeta = $o45[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/45.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/45.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o45[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte45('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o45[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o45[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte45('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o45[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o45[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte45('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o45[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o45[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte45('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o45[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o45[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte45('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o45[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 45
              if ($EstadoPlaca == $o45[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o45[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o45[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o45[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o45[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 18
              if ($estadoAusente == $o45[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              44 <br>
              <a href="#" onclick="cargarparte44()">
                <input type="hidden" id="parte44" value="44">
              <?php   
                  $carpeta = $o44[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/44.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/44.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o44[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte44('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o44[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o44[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte44('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o44[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o44[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte44('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o44[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o44[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte44('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o44[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o44[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte44('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o44[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 44
              if ($EstadoPlaca == $o44[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o44[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o44[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o44[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o44[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o44[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 18
              if ($estadoAusente == $o44[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">



              43 <br>
              <a href="#" onclick="cargarparte43()">
                <input type="hidden" id="parte43" value="43">
              <?php   
                  $carpeta = $o43[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/43.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/43.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o43[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte43('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o43[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o43[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte43('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o43[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o43[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte43('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o43[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o43[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte43('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o43[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o43[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte43('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o43[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 43
              if ($EstadoPlaca == $o43[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o43[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o43[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o43[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o43[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o43[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 43
              if ($estadoAusente == $o43[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              42 <br>
              <a href="#" onclick="cargarparte42()">
                <input type="hidden" id="parte42" value="42">
              <?php   
                  $carpeta = $o42[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/42.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/42.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o42[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte42('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o42[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o42[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte42('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o42[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o42[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte42('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o42[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o42[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte42('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o42[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o42[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte42('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o42[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 42

              if ($EstadoPlaca == $o42[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o42[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o42[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o42[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o42[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 42
              if ($estadoAusente == $o42[0]) {
                $Ausente++;
              }

              ?>



            </td>
            <td align="center">


              41 <br>
              <a href="#" onclick="cargarparte41()">
                <input type="hidden" id="parte41" value="41">
                <?php   
                  $carpeta = $o41[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/41.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/41.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o41[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte41('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o41[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o41[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte41('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o41[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o41[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte41('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o41[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o41[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte41('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o41[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o41[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte41('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o41[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 41
              if ($EstadoPlaca == $o41[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o41[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o41[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o41[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o41[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 41
              if ($estadoAusente == $o41[0]) {
                $Ausente++;
              }

              ?>




            </td>
            <td align="center">



              31 <br>
              <a href="#" onclick="cargarparte31()">
                <input type="hidden" id="parte31" value="31">
             <?php   
                  $carpeta = $o31[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/31.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/31.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o31[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte31('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o31[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o31[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte31('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o31[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o31[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte31('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o31[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o31[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte31('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o31[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o31[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte31('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o31[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 31
              if ($EstadoPlaca == $o31[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o31[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o31[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o31[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o31[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 31
              if ($estadoAusente == $o31[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">




              32 <br>
              <a href="#" onclick="cargarparte32()">
                <input type="hidden" id="parte32" value="32">
              <?php   
                  $carpeta = $o32[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/32.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/32.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o32[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte32('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o32[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o32[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte32('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o32[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o32[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte32('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o32[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o32[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte32('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o32[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o32[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte32('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o32[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 32
              if ($EstadoPlaca == $o32[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o32[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o32[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o32[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o32[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 18
              if ($estadoAusente == $o32[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">



              33 <br>
              <a href="#" onclick="cargarparte33()">
                <input type="hidden" id="parte33" value="33">
              <?php   
                  $carpeta = $o33[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/33.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/33.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o33[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte33('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o33[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o33[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte33('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o33[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o33[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte33('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o33[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o33[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte33('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o33[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o33[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;" <a href="#" onclick="cargarparte33('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o33[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 32
              if ($EstadoPlaca == $o33[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o33[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o33[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o33[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o33[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 35
              if ($estadoAusente == $o33[0]) {
                $Ausente++;
              }
              ?>

            </td>
            <td align="center">



              34 <br>
              <a href="#" onclick="cargarparte34()">
                <input type="hidden" id="parte34" value="34">
              <?php   
                  $carpeta = $o34[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/34.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/34.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o34[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte34('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o34[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o34[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte34('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o34[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o34[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte34('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o34[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o34[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte34('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o34[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o34[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte34('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o34[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 34
              if ($EstadoPlaca == $o34[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o34[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o34[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o34[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o34[5]) {
                $piezaPLaca++;
              }

              //estados ausentes del diente 34
              if ($estadoAusente == $o34[0]) {
                $Ausente++;
              }
              ?>

            </td>
            <td align="center">




              35 <br>
              <a href="#" onclick="cargarparte35()">
                <input type="hidden" id="parte35" value="35">
               <?php   
                  $carpeta = $o35[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/35.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/35.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o35[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte35('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o35[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o35[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte35('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o35[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o35[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte35('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o35[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o35[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte35('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o35[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o35[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte35('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o35[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>



              <?php
              //estado de la placa 35
              if ($EstadoPlaca == $o35[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o35[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o35[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o35[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o35[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 18
              if ($estadoAusente == $o35[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              36 <br>
              <a href="#" onclick="cargarparte36()">
                <input type="hidden" id="parte36" value="36">
               <?php   
                  $carpeta = $o36[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/36.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/36.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o36[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte36('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o36[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o36[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte36('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o36[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o36[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte36('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o36[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o36[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte36('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o36[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o36[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte36('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o36[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>


              <?php
              //estado de la placa 36
              if ($EstadoPlaca == $o36[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o36[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o36[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o36[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o36[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o36[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 36
              if ($estadoAusente == $o36[0]) {
                $Ausente++;
              }

              ?>

            </td>
            <td align="center">



              37 <br>
              <a href="#" onclick="cargarparte37()">
                <input type="hidden" id="parte37" value="37">
               <?php   
                  $carpeta = $o37[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/37.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/37.png">';
                  } ?>

              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o37[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte37('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o37[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o37[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte37('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o37[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o37[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte37('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o37[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o37[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte37('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o37[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o37[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte37('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o37[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 37
              if ($EstadoPlaca == $o37[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o37[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o37[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o37[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o37[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o37[5]) {
                $piezaPLaca++;
              }
              //estados ausentes del diente 37
              if ($estadoAusente == $o37[0]) {
                $Ausente++;
              }

              ?>


            </td>
            <td align="center">



              38 <br>
              <a href="#" onclick="cargarparte38()">
                <input type="hidden" id="parte38" value="38">
              <?php   
                  $carpeta = $o38[0];
                  $nombre_fichero = "Odontograma/oG{$carpeta}/38.png"; 
                            if (file_exists($nombre_fichero)) {
                      echo  "<img src='{$nombre_fichero}'>";
                  } else {
                      echo '<img src="Odontograma/oG5/38.png">';
                  } ?>
              </a>




              <table width="80%">
                <thead>
                  <tr>
                    <th style="background: transparent !important;"></th>
                    <th bgcolor="<?php echo funcionMaster($o38[1], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte38('1')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o38[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></th>
                    <th style="background: transparent !important;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td bgcolor="<?php echo funcionMaster($o38[2], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte38('2')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o38[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o38[3], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte38('3')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o38[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                    <td bgcolor="<?php echo funcionMaster($o38[4], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte38('4')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color:<?php echo funcionMaster($o38[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                    <td bgcolor="<?php echo funcionMaster($o38[5], 'id', 'color', 'OdontogramaEstados'); ?>" style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte38('5')" data-toggle="modal"><i class="fa fa-fw fa-square" style=" color :<?php echo funcionMaster($o38[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a></td>
                    <td align="center"></td>
                  </tr>
                </tbody>
              </table>

              <?php
              //estado de la placa 38
              if ($EstadoPlaca == $o38[0]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o38[1]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o38[2]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o38[3]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o38[4]) {
                $piezaPLaca++;
              } else if ($EstadoPlaca == $o38[5]) {
                $piezaPLaca++;
              }


              //estados ausentes del diente 38
              if ($estadoAusente == $o38[0]) {
                $Ausente++;
              }

              //calculos del diente con placa 
              $resultado  = $piezaPLaca * 100;
              $resultado2 = $Ausente * 5; //dientes ausentes

              //Total de los calculos
              $Total = $resultado / $resultado2;
              $resultado2 = 52 - $resultado2;
              ?>


            </td>
          </tr>
        </tbody>
      </table>


      <br>
      <br>
<!--

      <div class="col-md-12 text-center " style='border: 2px black  solid; border-radius: 20px;'>
        <div class="col-md-4">
          <div class="row">
            <strong>CALCULO DE INDICE</strong>
            <form action="registrar_placa.php" method="POST">
              <table border="2">
                <tr>
                  <td align="center"><strong># de superficies con placa x 100</strong></td>
                  <td align="center"><strong>total de dientes presentes</strong></td>
                </tr>
                <tbody>
                  <tr>
                    <td><input type="text" name="resultado" id="superficies" value="<?php echo  $resultado; ?>"></td>
                    <td><input type="text" name="resultado2" id="dientes_p" value="<?php echo  $resultado2; ?>"></td>

                  </tr>

                </tbody>
                <label>
                  <h3> TOTAL : <?php echo $Total; ?> % </h3>
                </label>
              </table>

          </div>

        </div>

        <div class='col-md-8'>
          <strong>OBSERVACIONES</strong>
          <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
          <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
          <div class="row">
            <textarea name="Observaciones" id="Observacionse" rows="5" cols="50" placeholder="Digite sus Observaciones......">
         </textarea>

          </div>
          <div>
            <input type="submit" name="Registrar" id="registros" value="Registrar" class="btn btn-primary" style="position:relative;left:220px;" />

          </div>
        </div>
        </form>
      </div>  

      <br>
      <br>
      <br>
      <br>

      <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary" style="position: relative;left: 155px;" onclick="location.reload();" />


-->


      </script>




    </section>










  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php include 'footer.php'; ?>



  <script type="text/javascript">
    function cargarDetalle() {
      var detalleOdontograma = $("#detalleOdontograma").val();
      var parteDetalleog = $("#parteDetalleog").val();
      var servicioAplicado = $("#servicioAplicado").val();
      var parteAplicada = $("#parteAplicada").val();
      var idCliente = $("#idCliente").val();

      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMasterDetalle.php",
        data: {
          detalleOdontograma: detalleOdontograma,
          parteDetalleog: parteDetalleog,
          idCliente: idCliente,
          servicioAplicado: servicioAplicado,
          parteAplicada: parteAplicada
        },
        success: function(response) {
          $('#cargarHistoriaDetalle').html(response);
        }
      });
    };



    function cargarparte18(pze) {
      var parte18 = $("#parte18").val();
      var pze18 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte18: parte18,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze18: pze18
        },
        success: function(response) {
          $('#cargarHistoria').html(response);
        }
      });
    };

    function cargarparte17(pze) {
      var parte17 = $("#parte17").val();
      var pze17 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte17: parte17,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze17: pze17
        },
        success: function(response) {

          $('#cargarHistoria').html(response);

        }
      });
    };


    function cargarparte16(pze) {
      var parte16 = $("#parte16").val();
      var pze16 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte16: parte16,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze16: pze16
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };


    function cargarparte15(pze) {
      var parte15 = $("#parte15").val();
      var pze15 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte15: parte15,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze15: pze15
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte14(pze) {
      var parte14 = $("#parte14").val();
      var pze14 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte14: parte14,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze14: pze14
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte13(pze) {
      var parte13 = $("#parte13").val();
      var pze13 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte13: parte13,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze13: pze13
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte12(pze) {
      var parte12 = $("#parte12").val();
      var pze12 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte12: parte12,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze12: pze12
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte11(pze) {
      var parte11 = $("#parte11").val();
      var pze11 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte11: parte11,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze11: pze11
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };






    function cargarparte28(pze) {
      var parte28 = $("#parte28").val();
      var pze28 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte28: parte28,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze28: pze28
        },
        success: function(response) {
          $('#cargarHistoria').html(response);
        }
      });
    };

    function cargarparte27(pze) {
      var parte27 = $("#parte27").val();
      var pze27 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte27: parte27,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze27: pze27
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

    function cargarparte26(pze) {
      var parte26 = $("#parte26").val();
      var pze26 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte26: parte26,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze26: pze26
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };


    function cargarparte25(pze) {
      var parte25 = $("#parte25").val();
      var pze25 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte25: parte25,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze25: pze25
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte24(pze) {
      var parte24 = $("#parte24").val();
      var pze24 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte24: parte24,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze24: pze24
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte23(pze) {
      var parte23 = $("#parte23").val();
      var pze23 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte23: parte23,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze23: pze23
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte22(pze) {
      var parte22 = $("#parte22").val();
      var pze22 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte22: parte22,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze22: pze22
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte21(pze) {
      var parte21 = $("#parte21").val();
      var pze21 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte21: parte21,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze21: pze21
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };










    function cargarparte48(pze) {
      var parte48 = $("#parte48").val();
      var pze48 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte48: parte48,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze48: pze48
        },
        success: function(response) {
          $('#cargarHistoria').html(response);
        }
      });
    };

    function cargarparte47(pze) {
      var parte47 = $("#parte47").val();
      var pze47 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte47: parte47,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze47: pze47
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

    function cargarparte46(pze) {
      var parte46 = $("#parte46").val();
      var pze46 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte46: parte46,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze46: pze46
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };


    function cargarparte45(pze) {
      var parte45 = $("#parte45").val();
      var pze45 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte45: parte45,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze45: pze45
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte44(pze) {
      var parte44 = $("#parte44").val();
      var pze44 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte44: parte44,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze44: pze44
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte43(pze) {
      var parte43 = $("#parte43").val();
      var pze43 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte43: parte43,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze43: pze43
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte42(pze) {
      var parte42 = $("#parte42").val();
      var pze42 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte42: parte42,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze42: pze42
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte41(pze) {
      var parte41 = $("#parte41").val();
      var pze41 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte41: parte41,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze41: pze41
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };








    function cargarparte38(pze) {
      var parte38 = $("#parte38").val();
      var pze38 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte38: parte38,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze38: pze38
        },
        success: function(response) {
          $('#cargarHistoria').html(response);
        }
      });
    };

    function cargarparte37(pze) {
      var parte37 = $("#parte37").val();
      var pze37 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte37: parte37,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze37: pze37
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

    function cargarparte36(pze) {
      var parte36 = $("#parte36").val();
      var pze36 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte36: parte36,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze36: pze36
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };


    function cargarparte35(pze) {
      var parte35 = $("#parte35").val();
      var pze35 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte35: parte35,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze35: pze35
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte34(pze) {
      var parte34 = $("#parte34").val();
      var pze34 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte34: parte34,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze34: pze34
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte33(pze) {
      var parte33 = $("#parte33").val();
      var pze33 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte33: parte33,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze33: pze33
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte32(pze) {
      var parte32 = $("#parte32").val();
      var pze32 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte32: parte32,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze32: pze32
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte31(pze) {
      var parte31 = $("#parte31").val();
      var pze31 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte31: parte31,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze31: pze31
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

















    function cargarparte55(pze) {
      var parte55 = $("#parte55").val();
      var pze55 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte55: parte55,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze55: pze55
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte54(pze) {
      var parte54 = $("#parte54").val();
      var pze54 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte54: parte54,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze54: pze54
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte53(pze) {
      var parte53 = $("#parte53").val();
      var pze53 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte53: parte53,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze53: pze53
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte52(pze) {
      var parte52 = $("#parte52").val();
      var pze52 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte52: parte52,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze52: pze52
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte51(pze) {
      var parte51 = $("#parte51").val();
      var pze51 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte51: parte51,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze51: pze51
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

















    function cargarparte65(pze) {
      var parte65 = $("#parte65").val();
      var pze65 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte65: parte65,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze65: pze65
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte64(pze) {
      var parte64 = $("#parte64").val();
      var pze64 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte64: parte64,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze64: pze64
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte63(pze) {
      var parte63 = $("#parte63").val();
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      var pze63 = pze;
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte63: parte63,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze63: pze63
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte62(pze) {
      var parte62 = $("#parte62").val();
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      var pze62 = pze;
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte62: parte62,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze62: pze62
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte61(pze) {
      var parte61 = $("#parte61").val();
      var pze61 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte61: parte61,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze61: pze61
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };

















    function cargarparte85(pze) {
      var parte85 = $("#parte85").val();
      var pze85 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte85: parte85,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze85: pze85
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte84(pze) {
      var parte84 = $("#parte84").val();
      var pze84 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte84: parte84,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze84: pze84
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte83(pze) {
      var parte83 = $("#parte83").val();
      var pze83 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte83: parte83,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze83: pze83
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte82(pze) {
      var parte82 = $("#parte82").val();
      var pze82 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte82: parte82,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze82: pze82
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte81(pze) {
      var parte81 = $("#parte81").val();
      var pze81 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte81: parte81,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze81: pze81
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };


















    function cargarparte75(pze) {
      var parte75 = $("#parte75").val();
      var pze75 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte75: parte75,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze75: pze75
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte74(pze) {
      var parte74 = $("#parte74").val();
      var pze74 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte74: parte74,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze74: pze74
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte73(pze) {
      var parte73 = $("#parte73").val();
      var pze73 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte73: parte73,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze73: pze73
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte72(pze) {
      var parte72 = $("#parte72").val();
      var pze72 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte72: parte72,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze72: pze72
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };



    function cargarparte71(pze) {
      var parte71 = $("#parte71").val();
      var pze71 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaMaster.php",
        data: {
          parte71: parte71,
          idCliente: idCliente,
          idUsuario: idUsuario,
          pze71: pze71
        },
        success: function(response) {
          $('#cargarHistoria').html(response);

        }
      });
    };
  </script>