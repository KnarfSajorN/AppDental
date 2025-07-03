<?php
include 'header.php';
$clienteId = $_GET['clienteId'];
$idPlaca = $_GET['id'];

$EstadoPlaca = 34;
$estadoAusente = 4;
$piezaPLaca = 0;
$Ausente = 0;
?>

<body>
  <?php include 'menu.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      </ol>
    </section>



    <br>
    <br>


    <div class="box">
      <div class="box-body" style="background-color: #d6d6d6cc;">
        <section class="content">




          <?php







          $query_ap = mysqli_query($conn3, "SELECT * FROM odontogramaMasterPlaca WHERE idCliente = $clienteId and id = $idPlaca");
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
          <input type="hidden" id="idPlaca" value="<?php echo $idPlaca ?>">
          <input type="hidden" id="EstadoPlaca" value="<?php echo $EstadoPlaca ?>">



          <table border="0" width="100%">

            <tbody>
              <tr>
                <td align="center">

                  18 <br>
                  <a href="#" onclick="cargarparte18()">
                    <input type="hidden" id="parte18" value="18">
                    <img src="Odontograma/oG<?php echo $o18[0] ?>/18.png">

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
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o18[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o18[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th bgcolor="<?php echo funcionMaster($o18[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;  width: 10%;"><a href="#" onclick="cargarparte18('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o18[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th bgcolor="<?php echo funcionMaster($o18[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o18[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th bgcolor="<?php echo funcionMaster($o18[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;  width: 10%;"><a href="#" onclick="cargarparte18('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o18[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>

                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o18[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;  width: 10%;"><a href="#" onclick="cargarparte18('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position:relative;left:5px; color:<?php echo funcionMaster($o18[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estados de la placa del diente 18
                  if ($EstadoPlaca == $o18[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o18[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o18[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o18[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o18[5]) {
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
                    <img src="Odontograma/oG<?php echo $o17[0] ?>/17.png">

                  </a>



                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o17[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte17('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o17[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o17[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte17('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o17[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o17[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte17('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o17[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o17[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte17('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o17[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o17[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte17('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o17[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 17
                  if ($EstadoPlaca == $o17[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o17[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o17[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o17[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o17[5]) {
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
                    <img src="Odontograma/oG<?php echo $o16[0] ?>/16.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o16[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte16('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o16[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o16[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte16('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o16[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o16[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte16('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o16[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o16[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte16('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o16[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o16[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte16('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o16[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 16
                  if ($EstadoPlaca == $o16[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o16[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o16[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o16[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o16[5]) {
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
                    <img src="Odontograma/oG<?php echo $o15[0] ?>/15.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o15[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte15('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o15[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o15[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte15('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o15[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o15[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte15('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 5px; color:<?php echo funcionMaster($o15[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o15[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte15('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o15[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o15[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte15('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 5px; color:<?php echo funcionMaster($o15[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
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
                  }
                  if ($EstadoPlaca == $o15[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o15[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o15[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o15[5]) {
                    $piezaPLaca++;
                  }

                  //estados ausentes del diente 16
                  if ($estadoAusente == $o15[0]) {
                    $Ausente++;
                  }
                  ?>

                  14 <br>
                  <a href="#" onclick="cargarparte14()">
                    <input type="hidden" id="parte14" value="14">
                    <img src="Odontograma/oG<?php echo $o14[0] ?>/14.png">

                  </a>



                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o14[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte14('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o14[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o14[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte14('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o14[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o14[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte14('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o14[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o14[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte14('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o14[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o14[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte14('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o14[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  /*
                  echo '$o14[1]'.$o14[1].'<br>';
                  echo '$o14[2]'.$o14[2].'<br>';
                  echo '$o14[3]'.$o14[3].'<br>';
                  echo '$o14[4]'.$o14[4].'<br>';
                  echo '$o14[5]'.$o14[5].'<br>';
                  */
                  //estado de la placa 14


                  if ($EstadoPlaca == $o14[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o14[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o14[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o14[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o14[5]) {
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
                    <img src="Odontograma/oG<?php echo $o13[0] ?>/13.png">

                  </a>





                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o13[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte13('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o13[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o13[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte13('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o13[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o13[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte13('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 5px; color:<?php echo funcionMaster($o13[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o13[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte13('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o13[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o13[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte13('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative;left: 5px; color:<?php echo funcionMaster($o13[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 13
                  if ($EstadoPlaca == $o13[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o13[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o13[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o13[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o13[5]) {
                    $piezaPLaca++;
                  }
                  //estados ausentes del diente 16
                  if ($estadoAusente == $o13[0]) {
                    $Ausente++;
                  }

                  ?>
                </td>
                <td align="center">12 <br>
                  <a href="#" onclick="cargarparte12()">
                    <input type="hidden" id="parte12" value="12">
                    <img src="Odontograma/oG<?php echo $o12[0] ?>/12.png">

                  </a>



                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o12[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte12('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o12[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o12[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte12('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o12[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o12[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte12('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative;left: 2px; color:<?php echo funcionMaster($o12[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o12[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte12('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o12[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o12[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte12('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o12[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>

                    <?php
                    //estado de la placa 12
                    if ($EstadoPlaca == $o12[1]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == $o12[2]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == $o12[3]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == $o12[4]) {
                      $piezaPLaca++;
                    }
                    if ($EstadoPlaca == $o12[5]) {
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
                    <img src="Odontograma/oG<?php echo $o11[0] ?>/11.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o11[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte11('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o11[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o11[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte11('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o11[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o11[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte11('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o11[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o11[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte11('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o11[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o11[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte11('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative;left: 2px; color:<?php echo funcionMaster($o11[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 11
                  if ($EstadoPlaca == $o11[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o11[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o11[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o11[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o11[5]) {
                    $piezaPLaca++;
                  }
                  //estados ausentes del diente 11
                  if ($estadoAusente == $o11[0]) {
                    $Ausente++;
                  }

                  ?>
                </td>
                <td align="center">

                  21 <br>
                  <a href="#" onclick="cargarparte21()">
                    <input type="hidden" id="parte21" value="21">
                    <img src="Odontograma/oG<?php echo $o21[0] ?>/21.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o21[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte21('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o21[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o21[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte21('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o21[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o21[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte21('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="position: relative; left: 2px; color:<?php echo funcionMaster($o21[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o21[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte21('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o21[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o21[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte21('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o21[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                <?php
                //estado de la placa 21
                if ($EstadoPlaca == $o21[0]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o21[1]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o21[2]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o21[3]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o21[4]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o21[5]) {
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
                    <img src="Odontograma/oG<?php echo $o22[0] ?>/22.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o22[1], 'id', 'color', 'OdontogramaEstados'); ?>"> <a
                            href="#" onclick="cargarparte22('1')" data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color:<?php echo funcionMaster($o22[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o22[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte22('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o22[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o22[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte22('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o22[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o22[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte22('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o22[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o22[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte22('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o22[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>

                <?php
                //estado de la placa 22
                if ($EstadoPlaca == $o22[1]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o22[2]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o22[3]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o22[4]) {
                  $piezaPLaca++;
                }
                if ($EstadoPlaca == $o22[5]) {
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
                    <img src="Odontograma/oG<?php echo $o23[0] ?>/23.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <th></th>
                      <th bgcolor="<?php echo funcionMaster($o23[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                        style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte23('1')"
                          data-toggle="modal"><i class="fa fa-fw fa-square"
                            style="color:<?php echo funcionMaster($o23[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                      </th>
                      <th></th>

                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o23[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte23('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o23[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o23[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte23('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o23[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o23[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte23('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o23[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o23[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte23('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" position: relative; left: 2px; color:<?php echo funcionMaster($o23[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>




                  <?php
                  //estado de la placa 23
                  if ($EstadoPlaca == $o23[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o23[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o23[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o23[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o23[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o23[5]) {
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
                    <img src="Odontograma/oG<?php echo $o24[0] ?>/24.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o24[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte24('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o24[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o24[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte24('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o24[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o24[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte24('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o24[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o24[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte24('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o24[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o24[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte24('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o24[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 24
                  if ($EstadoPlaca == $o24[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o24[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o24[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o24[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o24[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o24[5]) {
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
                    <img src="Odontograma/oG<?php echo $o25[0] ?>/25.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o25[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte25('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o25[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o25[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte25('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o25[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte25('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o25[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o25[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte25('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o25[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o25[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte25('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o25[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
                  //estado de la placa 25
                  if ($EstadoPlaca == $o25[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o25[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o25[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o25[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o25[5]) {
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
                    <img src="Odontograma/oG<?php echo $o26[0] ?>/26.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o26[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte26('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o26[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o26[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte26('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o26[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o26[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte26('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o26[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o26[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte26('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o26[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o26[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte26('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o26[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 26

                  if ($EstadoPlaca == $o26[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o26[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o26[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o26[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o26[5]) {
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
                    <img src="Odontograma/oG<?php echo $o27[0] ?>/27.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o27[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte27('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o27[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o27[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte27('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o27[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o27[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte27('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o27[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o27[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte27('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o27[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o27[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte27('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o27[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
                  //estado de la placa 27

                  if ($EstadoPlaca == $o27[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o27[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o27[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o27[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o27[5]) {
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
                    <img src="Odontograma/oG<?php echo $o28[0] ?>/28.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o28[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte28('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o28[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                              style="border-radius: 4px 4px 0px 0px;">&nbsp;</i></a></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o28[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte28('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o28[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                              style="border-radius: 5px 0px 0px 5px;">&nbsp;</i></a></td>
                        <td bgcolor="<?php echo funcionMaster($o28[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte28('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o28[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                              style="border-radius: 0px 0px 0px 0px;">&nbsp;</i></a></td>
                        <td bgcolor="<?php echo funcionMaster($o28[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte28('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o28[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                              style="border-radius: 0px 5px 5px 0px;">&nbsp;</i></a></td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o28[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte28('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o28[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                              style="border-radius: 0px 0px 5px 5px;">&nbsp;</i></a></td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 28
                  if ($EstadoPlaca == $o28[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o28[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o28[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o28[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o28[5]) {
                    $piezaPLaca++;
                  }


                  //estados ausentes del diente 25
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
                    <img src="Odontograma/oG<?php echo $o55[0] ?>/55.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o55[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte55('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o55[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o55[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte55('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o55[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o55[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte55('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o55[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o55[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte55('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o55[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o55[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte55('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o55[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
                  //estado de la placa 55
                  if ($EstadoPlaca == $o55[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o55[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o55[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o55[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o55[5]) {
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
                    <img src="Odontograma/oG<?php echo $o54[0] ?>/54.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o54[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte54('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o54[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o54[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte54('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o54[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o54[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte54('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o54[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o54[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte54('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o54[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o54[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte54('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o54[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 54

                  if ($EstadoPlaca == $o54[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o54[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o54[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o54[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o54[5]) {
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
                    <img src="Odontograma/oG<?php echo $o53[0] ?>/53.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o53[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte53('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o53[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o53[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte53('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o53[2], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o53[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte53('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o53[3], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o53[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte53('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o53[4], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o53[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte53('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o53[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 53
                  if ($EstadoPlaca == $o53[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o53[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o53[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o53[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o53[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o53[5]) {
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
                    <img src="Odontograma/oG<?php echo $o52[0] ?>/52.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o52[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte52('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o52[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o52[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte52('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o52[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o52[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte52('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o52[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o52[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte52('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o52[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o52[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte52('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o52[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 52
                  if ($EstadoPlaca == $o52[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o52[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o52[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o52[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o52[5]) {
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
                    <img src="Odontograma/oG<?php echo $o51[0] ?>/51.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o51[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte51('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o51[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o51[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte51('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style="color: <?php echo funcionMaster($o51[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>

                        <td bgcolor="<?php echo funcionMaster($o51[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte51('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color: <?php echo funcionMaster($o51[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>

                        <td bgcolor="<?php echo funcionMaster($o51[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte51('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o51[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o51[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte51('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color: <?php echo funcionMaster($o51[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 51
                  if ($EstadoPlaca == $o51[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o51[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o51[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o51[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o51[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o51[5]) {
                    $piezaPLaca++;
                  }
                  //estados ausentes del diente 51
                  if ($estadoAusente == $o51[0]) {
                    $Ausente++;
                  }

                  ?>





                </td>
                <td align="center">



                  61 <br>
                  <a href="#" onclick="cargarparte61()">
                    <input type="hidden" id="parte61" value="61">
                    <img src="Odontograma/oG<?php echo $o61[0] ?>/61.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o61[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte61('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o61[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o61[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte61('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o61[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o61[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte61('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o61[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o61[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte61('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o61[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o61[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte61('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o61[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 61
                  if ($EstadoPlaca == $o61[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o61[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o61[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o61[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o61[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o61[5]) {
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
                    <img src="Odontograma/oG<?php echo $o62[0] ?>/62.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o62[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte62('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o62[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o62[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte62('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o62[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o62[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte62('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o62[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o62[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte62('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o62[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o62[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte62('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o62[5], 'id', 'color', 'OdontogramaEstados'); ?>"">&nbsp;</i></a></td>
    <td align=" center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 62
                  if ($EstadoPlaca == $o62[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o62[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o62[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o62[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o62[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o62[5]) {
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
                    <img src="Odontograma/oG<?php echo $o63[0] ?>/63.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o63[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte63('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o63[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o63[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte63('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o63[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o63[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte63('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o63[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o63[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte63('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o63[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o63[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte63('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o63[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 63
                  if ($EstadoPlaca == $o63[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o63[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o63[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o63[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o63[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o63[5]) {
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
                    <img src="Odontograma/oG<?php echo $o64[0] ?>/64.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o64[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte64('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o64[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o64[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte64('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o64[2], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o64[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte64('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o64[3], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o64[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte64('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o64[4], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o64[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte64('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o64[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 64
                  if ($EstadoPlaca == $o64[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o64[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o64[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o64[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o64[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o64[5]) {
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
                    <img src="Odontograma/oG<?php echo $o65[0] ?>/65.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o65[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte65('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o65[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o65[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte65('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o65[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o65[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte65('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o65[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o65[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte65('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o65[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o65[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte65('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o65[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
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
          }
          if ($EstadoPlaca == $o65[2]) {
            $piezaPLaca++;
          }
          if ($EstadoPlaca == $o65[3]) {
            $piezaPLaca++;
          }
          if ($EstadoPlaca == $o65[4]) {
            $piezaPLaca++;
          }
          if ($EstadoPlaca == $o65[5]) {
            $piezaPLaca++;
          }
          //estados ausentes del diente 64
          if ($estadoAusente == $o64[0]) {
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
                    <img src="Odontograma/oG<?php echo $o85[0] ?>/85.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o85[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte85('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o85[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o85[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte85('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o85[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o85[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte85('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o85[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o85[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte85('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o85[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o85[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte85('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o85[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 85
                  if ($EstadoPlaca == $o85[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o85[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o85[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o85[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o85[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o85[5]) {
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
                    <img src="Odontograma/oG<?php echo $o84[0] ?>/84.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o84[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte84('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o84[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o84[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte84('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o84[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o84[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte84('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o84[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o84[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte84('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o84[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o84[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte84('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o84[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 84
                  if ($EstadoPlaca == $o84[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o84[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o84[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o84[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o84[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o84[5]) {
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
                    <img src="Odontograma/oG<?php echo $o83[0] ?>/83.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o83[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte83('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o83[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o83[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte83('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o83[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o83[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte83('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o83[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o83[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte83('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o83[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o83[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte83('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o83[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
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
                  }
                  if ($EstadoPlaca == $o83[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o83[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o83[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o83[5]) {
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
                    <img src="Odontograma/oG<?php echo $o82[0] ?>/82.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o82[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte82('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o82[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o82[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte82('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o82[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o82[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte82('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o82[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o82[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte82('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o82[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o82[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte82('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o82[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 82
                  if ($EstadoPlaca == $o82[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o82[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o82[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o82[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o82[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o82[5]) {
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
                    <img src="Odontograma/oG<?php echo $o81[0] ?>/81.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o81[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte81('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o81[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o81[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte81('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o81[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o81[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte81('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o81[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o81[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte81('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o81[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o81[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte81('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o81[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 81
                  if ($EstadoPlaca == $o81[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o81[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o81[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o81[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o81[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o81[5]) {
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
                    <img src="Odontograma/oG<?php echo $o71[0] ?>/71.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o71[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte71('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o71[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o71[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte71('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o71[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o71[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte71('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o71[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o71[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte71('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o71[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o71[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte71('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o71[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 71
                  if ($EstadoPlaca == $o71[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o71[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o71[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o71[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o71[5]) {
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
                    <img src="Odontograma/oG<?php echo $o72[0] ?>/72.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o72[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte72('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o72[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o72[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte72('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o72[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o72[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte72('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o72[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o72[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte72('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o72[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o72[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte72('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o72[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 72
                  if ($EstadoPlaca == $o72[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o72[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o72[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o72[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o72[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o72[5]) {
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
                    <img src="Odontograma/oG<?php echo $o73[0] ?>/73.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o73[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte73('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o73[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o73[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte73('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o73[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o73[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte73('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o73[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o73[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte73('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o73[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o73[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte73('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o73[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 73
                  if ($EstadoPlaca == $o73[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o73[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o73[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o73[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o73[5]) {
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
                    <img src="Odontograma/oG<?php echo $o74[0] ?>/74.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o74[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte74('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o74[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o74[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte74('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o74[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o74[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte74('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o74[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o74[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte74('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o74[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o74[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte74('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o74[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 74
                  if ($EstadoPlaca == $o74[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o74[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o74[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o74[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o74[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o74[5]) {
                    $piezaPLaca++;
                  }
                  //estados ausentes del diente 17
                  if ($estadoAusente == $o74[0]) {
                    $Ausente++;
                  }
                  ?>

                </td>
                <td align="center">



                  75 <br>
                  <a href="#" onclick="cargarparte75()">
                    <input type="hidden" id="parte75" value="75">
                    <img src="Odontograma/oG<?php echo $o75[0] ?>/75.png">

                  </a>




                  <table width="80%">
                    <thead>

                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o75[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte75('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o75[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o75[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte75('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o75[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o75[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte75('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o75[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o75[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte75('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o75[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o75[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte75('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o75[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
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
                  }
                  if ($EstadoPlaca == $o75[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o75[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o75[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o75[5]) {
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
                    <img src="Odontograma/oG<?php echo $o48[0] ?>/48.png">

                  </a>




                  <table width="80%">

                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o48[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte48('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o48[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o48[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte48('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o48[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o48[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte48('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o48[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o48[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte48('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o48[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o48[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte48('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o48[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>



                  <?php
                  //estado de la placa 48
                  if ($EstadoPlaca == $o48[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o48[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o48[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o48[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o48[5]) {
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
                    <img src="Odontograma/oG<?php echo $o47[0] ?>/47.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o47[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte47('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o47[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o47[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte47('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o47[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o47[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte47('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o47[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o47[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte47('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o47[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o47[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte47('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o47[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 47
                  if ($EstadoPlaca == $o47[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o47[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o47[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o47[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o47[5]) {
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
                    <img src="Odontograma/oG<?php echo $o46[0] ?>/46.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o46[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte46('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o46[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o46[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte46('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o46[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o46[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte46('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o46[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o46[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte46('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o46[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o46[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte46('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o46[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 46
                  if ($EstadoPlaca == $o46[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o46[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o46[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o46[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o46[5]) {
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
                    <img src="Odontograma/oG<?php echo $o45[0] ?>/45.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o45[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte45('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o45[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o45[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte45('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o45[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o45[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte45('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o45[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o45[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte45('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o45[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o45[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte45('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o45[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 45
                  if ($EstadoPlaca == $o45[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o45[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o45[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o45[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o45[5]) {
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
                    <img src="Odontograma/oG<?php echo $o44[0] ?>/44.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o44[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte44('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o44[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o44[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte44('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o44[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o44[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte44('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o44[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o44[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte44('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o44[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o44[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte44('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o44[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 44
                  if ($EstadoPlaca == $o44[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o44[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o44[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o44[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o44[5]) {
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
                    <img src="Odontograma/oG<?php echo $o43[0] ?>/43.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o43[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte43('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o43[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o43[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte43('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o43[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o43[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte43('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o43[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o43[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte43('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o43[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o43[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte43('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o43[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 43
                  if ($EstadoPlaca == $o43[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o43[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o43[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o43[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o43[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o43[5]) {
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
                    <img src="Odontograma/oG<?php echo $o42[0] ?>/42.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o42[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte42('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o42[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o42[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte42('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o42[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o42[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte42('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o42[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o42[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte42('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o42[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o42[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte42('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o42[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 42

                  if ($EstadoPlaca == $o42[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o42[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o42[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o42[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o42[5]) {
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
                    <img src="Odontograma/oG<?php echo $o41[0] ?>/41.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o41[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte41('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o41[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o41[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte41('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o41[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o41[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte41('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o41[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o41[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte41('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o41[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o41[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte41('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o41[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 41
                  if ($EstadoPlaca == $o41[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o41[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o41[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o41[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o41[5]) {
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
                    <img src="Odontograma/oG<?php echo $o31[0] ?>/31.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o31[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte31('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o31[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o31[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte31('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o31[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o31[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte31('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o31[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o31[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte31('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o31[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o31[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte31('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o31[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 31
                  if ($EstadoPlaca == $o31[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o31[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o31[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o31[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o31[5]) {
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
                    <img src="Odontograma/oG<?php echo $o32[0] ?>/32.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o32[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte32('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o32[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o32[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte32('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o32[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o32[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte32('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o32[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o32[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte32('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o32[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o32[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte32('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o32[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 32
                  if ($EstadoPlaca == $o32[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o32[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o32[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o32[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o32[5]) {
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
                    <img src="Odontograma/oG<?php echo $o33[0] ?>/33.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o33[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte33('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o33[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o33[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte33('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o33[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o33[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte33('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o33[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o33[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte33('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o33[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o33[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte33('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o33[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 32
                  if ($EstadoPlaca == $o33[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o33[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o33[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o33[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o33[5]) {
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
                    <img src="Odontograma/oG<?php echo $o34[0] ?>/34.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o34[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte34('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o34[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o34[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte34('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o34[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o34[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte34('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o34[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o34[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte34('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o34[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o34[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte34('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o34[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 34
                  if ($EstadoPlaca == $o34[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o34[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o34[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o34[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o34[5]) {
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
                    <img src="Odontograma/oG<?php echo $o35[0] ?>/35.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o35[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte35('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o35[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o35[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte35('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o35[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o35[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte35('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o35[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o35[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte35('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o35[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o35[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte35('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o35[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>



                  <?php
                  //estado de la placa 35
                  if ($EstadoPlaca == $o35[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o35[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o35[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o35[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o35[5]) {
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
                    <img src="Odontograma/oG<?php echo $o36[0] ?>/36.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o36[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte36('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o36[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o36[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte36('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o36[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o36[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte36('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o36[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o36[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte36('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o36[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o36[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte36('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o36[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>


                  <?php
                  //estado de la placa 36
                  if ($EstadoPlaca == $o36[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o36[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o36[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o36[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o36[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o36[5]) {
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
                    <img src="Odontograma/oG<?php echo $o37[0] ?>/37.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o37[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte37('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o37[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o37[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte37('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o37[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o37[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte37('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o37[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o37[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte37('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o37[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o37[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte37('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o37[5], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 37
                  if ($EstadoPlaca == $o37[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o37[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o37[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o37[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o37[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o37[5]) {
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
                    <img src="Odontograma/oG<?php echo $o38[0] ?>/38.png">

                  </a>




                  <table width="80%">
                    <thead>
                      <tr>
                        <th></th>
                        <th bgcolor="<?php echo funcionMaster($o38[1], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 4px 4px 0px 0px;"><a href="#" onclick="cargarparte38('1')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o38[1], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td bgcolor="<?php echo funcionMaster($o38[2], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 5px 0px 0px 5px;"><a href="#" onclick="cargarparte38('2')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o38[2], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o38[3], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 0px 0px;"><a href="#" onclick="cargarparte38('3')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o38[3], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                        <td bgcolor="<?php echo funcionMaster($o38[4], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 5px 5px 0px;"><a href="#" onclick="cargarparte38('4')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color:<?php echo funcionMaster($o38[4], 'id', 'color', 'OdontogramaEstados'); ?>">&nbsp;</i></a>
                        </td>
                      </tr>
                      <tr>
                        <td align="center"></td>
                        <td bgcolor="<?php echo funcionMaster($o38[5], 'id', 'color', 'OdontogramaEstados'); ?>"
                          style="border-radius: 0px 0px 5px 5px;"><a href="#" onclick="cargarparte38('5')"
                            data-toggle="modal"><i class="fa fa-fw fa-square"
                              style=" color :<?php echo funcionMaster($o38[5], 'id', 'color', 'OdontogramaEstados'); ?>;">&nbsp;</i></a>
                        </td>
                        <td align="center"></td>
                      </tr>
                    </tbody>
                  </table>

                  <?php
                  //estado de la placa 38
                  if ($EstadoPlaca == $o38[0]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o38[1]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o38[2]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o38[3]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o38[4]) {
                    $piezaPLaca++;
                  }
                  if ($EstadoPlaca == $o38[5]) {
                    $piezaPLaca++;
                  }


                  //estados ausentes del diente 38
                  if ($estadoAusente == $o38[0]) {
                    $Ausente++;
                  }

                  //calculos del diente con placa
                  $resultado = $piezaPLaca * 100;//superficie con placa


                  $resultado2 = 52 - $Ausente;


                  $resultado2 = $resultado2 * 4;


                  //Total de los calculos
                  $Total = $resultado / $resultado2;





                  ?>


                </td>
              </tr>
            </tbody>
          </table>


          <br>
          <br>
          <div class="col-md-12 text-center row" style='border: 2px black  solid; border-radius: 20px;'>
            <div class="col-md-4">
              <div class="">
                <strong>CALCULO DE INDICE</strong>
                <form action="OD_RegistrarPlaca" method="POST">
                  <table border="2">
                    <tr>
                      <td align="center"><strong># de superficies con placa x 100</strong></td>
                      <td align="center"><strong>total de dientes presentes por 4</strong></td>
                    </tr>
                    <tbody>
                      <tr>
                        <td><input type="hidden" name="resultado" id="superficies" value="<?php echo $resultado; ?>">
                          <?php echo $resultado; ?>
                        </td>
                        <td><input type="hidden" name="resultado2" id="dientes_p" value="<?php echo $resultado2; ?>">
                          <?php echo $resultado2; ?></td>

                      </tr>

                    </tbody>
                    <label>
                      <h3> TOTAL : <?php echo number_format($Total); ?> % </h3>
                    </label>
                    <td><input type="hidden" name="porcenaje" value="<?php echo $Total; ?>">

                  </table>

              </div>

            </div>

            <div class='col-md-8'>
              <strong>OBSERVACIONES</strong>
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
              <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
              <input type="hidden" name="idPlaca" value="<?php echo $idPlaca ?>">



              <div class="">
                <textarea name="Observaciones" id="Observacionse" rows="5" cols="50"
                  placeholder="Digite sus Observaciones......"></textarea>

              </div>
              <div style="width:100%">
                <input type="submit" name="Registrar" id="registros" value="Registrar"
                  class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%" />

              </div>
            </div>
            </form>
          </div>


          <br>
          <br>
          <br>
          <br>
          <div style="width:100%">
            <input type="submit" name="enviar" value="Actualizar"
              class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%"
              onclick="location.reload();" />
          </div>



          </script>




        </section>
      </div>
    </div>








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
        url: "ajax_historiaOdontogramaPlacaMasterDetalle.php",
        data: { detalleOdontograma: detalleOdontograma, parteDetalleog: parteDetalleog, idCliente: idCliente, servicioAplicado: servicioAplicado, parteAplicada: parteAplicada },
        success: function (response) {
          $('#cargarHistoriaDetalle').html(response);
        }
      });
    };



    function cargarparte18(pze) {
      var parte18 = $("#parte18").val();
      var pze18 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();

      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte18: parte18, idCliente: idCliente, idUsuario: idUsuario, pze18: pze18, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };
    function cargarparte17(pze) {
      var parte17 = $("#parte17").val();
      var pze17 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte17: parte17, idCliente: idCliente, idUsuario: idUsuario, pze17: pze17, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {

          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


    function cargarparte16(pze) {
      var parte16 = $("#parte16").val();
      var pze16 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte16: parte16, idCliente: idCliente, idUsuario: idUsuario, pze16: pze16, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


    function cargarparte15(pze) {
      var parte15 = $("#parte15").val();
      var pze15 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte15: parte15, idCliente: idCliente, idUsuario: idUsuario, pze15: pze15, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte14(pze) {
      var parte14 = $("#parte14").val();
      var pze14 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte14: parte14, idCliente: idCliente, idUsuario: idUsuario, pze14: pze14, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte13(pze) {
      var parte13 = $("#parte13").val();
      var pze13 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte13: parte13, idCliente: idCliente, idUsuario: idUsuario, pze13: pze13, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte12(pze) {
      var parte12 = $("#parte12").val();
      var pze12 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte12: parte12, idCliente: idCliente, idUsuario: idUsuario, pze12: pze12, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte11(pze) {
      var parte11 = $("#parte11").val();
      var pze11 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte11: parte11, idCliente: idCliente, idUsuario: idUsuario, pze11: pze11, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };






    function cargarparte28(pze) {
      var parte28 = $("#parte28").val();
      var pze28 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte28: parte28, idCliente: idCliente, idUsuario: idUsuario, pze28: pze28, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

    function cargarparte27(pze) {
      var parte27 = $("#parte27").val();
      var pze27 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte27: parte27, idCliente: idCliente, idUsuario: idUsuario, pze27: pze27, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

    function cargarparte26(pze) {
      var parte26 = $("#parte26").val();
      var pze26 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte26: parte26, idCliente: idCliente, idUsuario: idUsuario, pze26: pze26, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


    function cargarparte25(pze) {
      var parte25 = $("#parte25").val();
      var pze25 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte25: parte25, idCliente: idCliente, idUsuario: idUsuario, pze25: pze25, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte24(pze) {
      var parte24 = $("#parte24").val();
      var pze24 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte24: parte24, idCliente: idCliente, idUsuario: idUsuario, pze24: pze24, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte23(pze) {
      var parte23 = $("#parte23").val();
      var pze23 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte23: parte23, idCliente: idCliente, idUsuario: idUsuario, pze23: pze23, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte22(pze) {
      var parte22 = $("#parte22").val();
      var pze22 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte22: parte22, idCliente: idCliente, idUsuario: idUsuario, pze22: pze22, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte21(pze) {
      var parte21 = $("#parte21").val();
      var pze21 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte21: parte21, idCliente: idCliente, idUsuario: idUsuario, pze21: pze21, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };






    function cargarparte48(pze) {
      var parte48 = $("#parte48").val();
      var pze48 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte48: parte48, idCliente: idCliente, idUsuario: idUsuario, pze48: pze48, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte47(pze) {
      var parte47 = $("#parte47").val();
      var pze47 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte47: parte47, idCliente: idCliente, idUsuario: idUsuario, pze47: pze47, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

    function cargarparte46(pze) {
      var parte46 = $("#parte46").val();
      var pze46 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte46: parte46, idCliente: idCliente, idUsuario: idUsuario, pze46: pze46, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


    function cargarparte45(pze) {
      var parte45 = $("#parte45").val();
      var pze45 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte45: parte45, idCliente: idCliente, idUsuario: idUsuario, pze45: pze45, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte44(pze) {
      var parte44 = $("#parte44").val();
      var pze44 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte44: parte44, idCliente: idCliente, idUsuario: idUsuario, pze44: pze44, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };









    function cargarparte43(pze) {
      var parte43 = $("#parte43").val();
      var pze43 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte43: parte43, idCliente: idCliente, idUsuario: idUsuario, pze43: pze43, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };





    function cargarparte42(pze) {
      var parte42 = $("#parte42").val();
      var pze42 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte42: parte42, idCliente: idCliente, idUsuario: idUsuario, pze42: pze42, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte41(pze) {
      var parte41 = $("#parte41").val();
      var pze41 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte41: parte41, idCliente: idCliente, idUsuario: idUsuario, pze41: pze41, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };







    function cargarparte38(pze) {
      var parte38 = $("#parte38").val();
      var pze38 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte38: parte38, idCliente: idCliente, idUsuario: idUsuario, pze38: pze38, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte37(pze) {
      var parte37 = $("#parte37").val();
      var pze37 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte37: parte37, idCliente: idCliente, idUsuario: idUsuario, pze37: pze37, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

    function cargarparte36(pze) {
      var parte36 = $("#parte36").val();
      var pze36 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte36: parte36, idCliente: idCliente, idUsuario: idUsuario, pze36: pze36, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


    function cargarparte35(pze) {
      var parte35 = $("#parte35").val();
      var pze35 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte35: parte35, idCliente: idCliente, idUsuario: idUsuario, pze35: pze35, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte34(pze) {
      var parte34 = $("#parte34").val();
      var pze34 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte34: parte34, idCliente: idCliente, idUsuario: idUsuario, pze34: pze34, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte33(pze) {
      var parte33 = $("#parte33").val();
      var pze33 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte33: parte33, idCliente: idCliente, idUsuario: idUsuario, pze33: pze33, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte32(pze) {
      var parte32 = $("#parte32").val();
      var pze32 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte32: parte32, idCliente: idCliente, idUsuario: idUsuario, pze32: pze32, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte31(pze) {
      var parte31 = $("#parte31").val();
      var pze31 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte31: parte31, idCliente: idCliente, idUsuario: idUsuario, pze31: pze31, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

















    function cargarparte55(pze) {
      var parte55 = $("#parte55").val();
      var pze55 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte55: parte55, idCliente: idCliente, idUsuario: idUsuario, pze55: pze55, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };








    function cargarparte54(pze) {
      var parte54 = $("#parte54").val();
      var pze54 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte54: parte54, idCliente: idCliente, idUsuario: idUsuario, pze54: pze54, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };




    function cargarparte53(pze) {
      var parte53 = $("#parte53").val();
      var pze53 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte53: parte53, idCliente: idCliente, idUsuario: idUsuario, pze53: pze53, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };





    function cargarparte52(pze) {
      var parte52 = $("#parte52").val();
      var pze52 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte52: parte52, idCliente: idCliente, idUsuario: idUsuario, pze52: pze52, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte51(pze) {
      var parte51 = $("#parte51").val();
      var pze51 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte51: parte51, idCliente: idCliente, idUsuario: idUsuario, pze51: pze51, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

















    function cargarparte65(pze) {
      var parte65 = $("#parte65").val();
      var pze65 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte65: parte65, idCliente: idCliente, idUsuario: idUsuario, pze65: pze65, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte64(pze) {
      var parte64 = $("#parte64").val();
      var pze64 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte64: parte64, idCliente: idCliente, idUsuario: idUsuario, pze64: pze64, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte63(pze) {
      var parte63 = $("#parte63").val();
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      var pze63 = pze;
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte63: parte63, idCliente: idCliente, idUsuario: idUsuario, pze63: pze63, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte62(pze) {
      var parte62 = $("#parte62").val();
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      var pze62 = pze;
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte62: parte62, idCliente: idCliente, idUsuario: idUsuario, pze62: pze62, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte61(pze) {
      var parte61 = $("#parte61").val();
      var pze61 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte61: parte61, idCliente: idCliente, idUsuario: idUsuario, pze61: pze61, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };

















    function cargarparte85(pze) {
      var parte85 = $("#parte85").val();
      var pze85 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte85: parte85, idCliente: idCliente, idUsuario: idUsuario, pze85: pze85, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte84(pze) {
      var parte84 = $("#parte84").val();
      var pze84 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte84: parte84, idCliente: idCliente, idUsuario: idUsuario, pze84: pze84, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte83(pze) {
      var parte83 = $("#parte83").val();
      var pze83 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte83: parte83, idCliente: idCliente, idUsuario: idUsuario, pze83: pze83, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte82(pze) {
      var parte82 = $("#parte82").val();
      var pze82 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte82: parte82, idCliente: idCliente, idUsuario: idUsuario, pze82: pze82, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte81(pze) {
      var parte81 = $("#parte81").val();
      var pze81 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte81: parte81, idCliente: idCliente, idUsuario: idUsuario, pze81: pze81, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };


















    function cargarparte75(pze) {
      var parte75 = $("#parte75").val();
      var pze75 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte75: parte75, idCliente: idCliente, idUsuario: idUsuario, pze75: pze75, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte74(pze) {
      var parte74 = $("#parte74").val();
      var pze74 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte74: parte74, idCliente: idCliente, idUsuario: idUsuario, pze74: pze74, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte73(pze) {
      var parte73 = $("#parte73").val();
      var pze73 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte73: parte73, idCliente: idCliente, idUsuario: idUsuario, pze73: pze73, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte72(pze) {
      var parte72 = $("#parte72").val();
      var pze72 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte72: parte72, idCliente: idCliente, idUsuario: idUsuario, pze72: pze72, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };



    function cargarparte71(pze) {
      var parte71 = $("#parte71").val();
      var pze71 = pze;
      var idCliente = $("#idCliente").val();
      var idUsuario = $("#idUsuario").val();

      var idPlaca = $("#idPlaca").val();
      var EstadoPlaca = $("#EstadoPlaca").val();
      // aqui enviamos el mensaje por medio de un arreglo
      $.ajax({
        type: "POST",
        url: "ajax_historiaOdontogramaPlacaMaster.php",
        data: { parte71: parte71, idCliente: idCliente, idUsuario: idUsuario, pze71: pze71, idPlaca: idPlaca, EstadoPlaca: EstadoPlaca },
        success: function (response) {
          $('#cargarHistoria').html(response);
          location.reload();
        }
      });
    };












  </script>