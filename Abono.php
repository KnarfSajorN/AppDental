   <?php
    include 'header.php';
    include 'menu.php';

    $ID_Usuario  =  $_SESSION['ID'];
    $ID_UsuarioP =  $_SESSION['ID_principal'];

    $idOperacion = $_GET['idOperacion'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idOperacion      = $rowMotorizado['idOperacion'];
        $numeroDoc      = $rowMotorizado['numeroDoc'];
        $idCliente      = $rowMotorizado['idCliente'];
        $idUsuario = $rowMotorizado['idEmpresa'];

        $totalNeto      = $rowMotorizado['totalNeto'];
        $montoPagado      = $rowMotorizado['montoPagado'];
    }

    $saldo = $totalNeto - $montoPagado;

    $nombre_paciente = funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');

    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idUsuario");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $moneda = $rowMotorizado['moneda'];
    }






    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <h1>
               Abono del Paciente <?php echo $nombre_paciente ?>

           </h1>
           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
               <li><a href="#">Pacientes</a></li>
           </ol>
       </section>



       <!-- Main content -->
       <section class="content">
           <div>
               <div class="col-xs-6 col-md-offset-3">
                   <?php
                    $msg = $_GET['msg'];
                    if ($msg == '1') {
                        echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
                    }

                    if ($msg == '2') {
                        echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>';
                    }
                    if ($msg == '3') {
                        echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>';
                    }
                    ?>

                   <div class="box">
                       <form action="AbonoRegistrar.php" method="POST" name="formularioActualizarcliente">
                           <div class="box-header" align="center">
                               <h2>Abono del Documento #<?php echo $numeroDoc ?></h2>
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                               <div class="form-group col-md-12">
                                   <div align="left">
                                       <h3>Saldo <br>
                                           <?php echo number_format($saldo, 2) . " " . $moneda ?> </h3>
                                   </div>
                               </div>

                               <div class="form-group col-md-12">
                                   <div align="left">Fecha de pago</div>
                                   <input type="date" class="form-control input-lg" id="fecha_abono" name="fecha_abono" required>
                               </div>
                               <div class="form-group col-md-12">
                                   <div align="left">Valor a Abonar</div>
                                   <input type="number" class="form-control input-lg" id="valor_abonar" name="valor_abonar" step="0.01" min="0" max="<?php echo $saldo ?>" required>
                               </div>


                               
                                   <!-- 
                   <select id="pago" name="pago" class="form-control input-lg select" style="width: 100%;">
                     <option value="Efectivo">Efectivo</option>
                     <option value="Cheque">Cheque</option>
                     <option value="Dep&oacutesito">Depósito</option>
                     <option value="Tarjeta de cr&eacute;dito">Tarjeta de crédito</option>
                     <option value="Transferencia">Transferencia</option>
                     <option value="Otro">Otro</option>

                   </select> -->
                                   <?php
                                    $queryUser = "SELECT * FROM Medios_Pago WHERE ID_principal = $ID_UsuarioP AND Activo = '1' ";
                                    $QueryMedioPago = mysqli_query($conn3, $queryUser);
                                    $usersRow = null;
                                    while ($RowMedioPago = mysqli_fetch_assoc($QueryMedioPago)) {
                                        $usersRow[] = $RowMedioPago;
                                    }

                                    ?>


                                   <div class="form-group col-md-12">
                                       <div align="left"><label>Método de Pago</label></div>
                                       <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                                           <option value="">Seleccione...</option>
                                           <?php
                                            foreach ($usersRow as $user) {
                                                echo '<option value="' . $user['id'] . '">' . $user['Nombre'] . '</option>';
                                            }
                                            ?>
                                       </select>
                                   </div>
                                   <script>
                        document.getElementById('metodo_pago').addEventListener('change', mostrarQr);

                        function mostrarQr() {
                          let selectValue = this.value;
                          console.log(`este es el  valor del select: ` + selectValue);
                          let medioPago = [];
                          medioPago = '<?= json_encode($usersRow); ?>';
                          let arreglo = JSON.parse(medioPago);
                          console.log(arreglo);

                          for (let index = 0; index < arreglo.length; index++) {
                            if (arreglo[index].id == selectValue) {
                              let imagenQr = arreglo[index].imagenQr;
                              if (imagenQr != '' && imagenQr != null) {
                                window.open('<?= $Base ?>uploads/'+arreglo[index].usuario_id+'/metodosdepagos/'+imagenQr, 'ventan1', 'width=300,height=300');
                              } else {
                                break;
                              } 
                            }
                          }
                        };
                      </script>


                                   <!-- <div class="form-group col-md-12">
                                   <div align="left">Tarjeta de crédito/Banco</div>
                                   <input type="text" class="form-control input-lg" id="banco" name="banco">
                               </div>
                               <div class="form-group col-md-12">
                                   <div align="left">Número de Tarj. crédito/cheque</div>
                                   <input type="text" class="form-control input-lg" id="tarjeta" name="tarjeta">
                               </div>
                               <div class="form-group col-md-12">
                                   <div align="left">Número de Cuenta</div>
                                   <input type="text" class="form-control input-lg" id="cuenta" name="cuenta">
                               </div> -->
                                   <div class="form-group col-md-12">
                                       <div align="left"> Notas </div>


                                       <textarea id="nota" name="nota" class="textarea" placeholder="Notas " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                   </div>


                                   <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                                   <input type="hidden" name="clienteId" value="<?php echo $idCliente ?>">
                                   <input type="hidden" name="idOperacion" value="<?php echo $idOperacion ?>">
                                   <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                           <h2> <strong> Abonar </strong> </h2>
                                       </button></center>
                               </div>
                       </form>
                       <!-- /.box-body -->
                   </div>
                   <!-- /.box -->
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