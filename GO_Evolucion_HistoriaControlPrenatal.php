<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['cliente'];
    $usuarioId = $_GET['usuarioId'];
    $historiaClinica = $_GET['historiaClinica'];
    $idHistoria = $_GET['idHistoria'];
if ( $idHistoria =='') {$idHistoria = 0;}
    $ID = $_SESSION['ID'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
  $nrowl=mysqli_num_rows($queryList);
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
      $usuario_id=$rowMotorizado['usuario_id'];
      $nombre_cliente=$rowMotorizado['nombre_cliente'];
      $celular_cliente=$rowMotorizado['celular_cliente'];
      $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
      $correo_cliente=$rowMotorizado['correo_cliente'];
      $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
      $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
      $tipo_cliente=$rowMotorizado['tipo_cliente'];
      $fechar=$rowMotorizado['fechar'];
      $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
      $activo=$rowMotorizado['activo'];
      $genero=$rowMotorizado['genero'];
      $direccion_cliente=$rowMotorizado['direccion_cliente'];
      $telefono_cliente=$rowMotorizado['telefono_cliente'];
      $edad_cliente=$rowMotorizado['edad_cliente'];
      $profesion_cliente=$rowMotorizado['profesion_cliente'];
      $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
      $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
      $antecedentes     =$rowMotorizado['antecedentes'];
      $fotoperfil       =$rowMotorizado['fotoperfil'];
      $tiposSangre      =$rowMotorizado['tiposSangre'];
      $dis          =$rowMotorizado['dis'];
      $tipodiscapacidad      =$rowMotorizado['tipodiscapacidad'];
      $etnia            =$rowMotorizado['etnia'];
      $esDonante        =$rowMotorizado['esDonante'];
      $tomaMedicamento  =$rowMotorizado['tomaMedicamento'];

      $fechaNacimiento  =$rowMotorizado['fechaNacimiento'];

      $entidadSalud     =$rowMotorizado['entidadSalud'];
      $seguro           =$rowMotorizado['seguro'];

      $nota           =$rowMotorizado['nota'];
      $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno'];
      $alergias           =$rowMotorizado['alergias'];


      $peso           =$rowMotorizado['peso'];
      $altura           =$rowMotorizado['altura'];
      $imc           =$rowMotorizado['imc'];
      $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal'];

        // -----------------------------------------------------------------------

        $ap1            = $rowMotorizado['ap1'];
        $ap2            = $rowMotorizado['ap2'];
        $ap3            = $rowMotorizado['ap3'];
        $ap4            = $rowMotorizado['ap4'];
        $ap5            = $rowMotorizado['ap5'];
        $ap6            = $rowMotorizado['ap6'];
        $ap7            = $rowMotorizado['ap7'];
        $ap8            = $rowMotorizado['ap8'];
        $ap9            = $rowMotorizado['ap9'];

        $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
        $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
        $whatsapp       = $rowMotorizado['whatsapp'];
        $tipoUsuario    = $rowMotorizado['tipoUsuario'];
        $estado         = $rowMotorizado['estado'];
        $ocupacion    = $rowMotorizado['ocupacion'];

    }

  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");


  $nrowl=mysqli_num_rows($queryconfig);
  while($rowconfig=mysqli_fetch_array($queryconfig))
  {
      $cie10 = $rowconfig['cie10'];
      $pro1  = $rowconfig['pro1'];
      $pro2  = $rowconfig['pro2'];
  }

$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }

        if ($queryList =='') {
            $idR == 1; }
             else{
            $idR   = ($idReceta+1);}


 
        ?>


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Evolucion Control Prenatal, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Evolucion Control Prenatal  </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
             

              <div class="box box-solid">

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion1">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                            Datos personales
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse">
                        <?php echo datosPacientes($clienteId);?>
                      </div>
                    </div>
                  
            <form action="GO_Evolucion_GuardarHistoriaControlPrenatal.php" method="POST" name="formularioActualizarcliente">
                   <!--Div de  Imagenologia-->
                  <div class=" box-group box-primary">
                         <div class="box-group" >
                         

                            
<div class="form-group col-md-12">
              <div align="left">Fecha</div>
              <input type="date" class="form-control input-lg" id="fecha_terminacion" name="fecha_terminacion" placeholder="Fecha">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Semana Embarazo</div>
              <input type="text" class="form-control input-lg" id="semana_emabarazo" name="semana_emabarazo" placeholder="Semana Embarazo">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Presión Arterial </div>
              <input type="text" class="form-control input-lg" id="presion_arterial" name="presion_arterial" placeholder="Presión Arterial">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Pulso </div>
              <input type="text" class="form-control input-lg" id="pulso" name="pulso" placeholder="Pulso">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Temperatura </div>
              <input type="text" class="form-control input-lg" id="tempratura" name="tempratura" placeholder="Temperatura">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Peso </div>
              <input type="text" class="form-control input-lg" id="peso" name="peso" placeholder="Peso">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Altura Uterina </div>
              <input type="text" class="form-control input-lg" id="altura" name="altura" placeholder="Altura Uterina">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Frecuencia Cardiaca Fetal </div>
              <input type="text" class="form-control input-lg" id="frecuencia" name="frecuencia" placeholder="Frecuencia Cardiaca Fetal">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Posición </div>
              <input type="text" class="form-control input-lg" id="posicion" name="posicion" placeholder="Posición">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Presentación </div>
              <input type="text" class="form-control input-lg" id="presentacion" name="presentacion" placeholder="Presentación">
            </div>


            <div class="form-group col-md-12">
              <div align="left">Movimientos Fetales </div>
              <input type="text" class="form-control input-lg" id="movimientos" name="movimientos" placeholder="Movimientos Fetales">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Edema</div>
              <input type="text" class="form-control input-lg" id="edema" name="edema" placeholder="Edema">
            </div>
            
                          <hr>
                      

                          <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                          <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                          <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                          <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                          <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                          <input  type="hidden" name="receta"  value="<?php echo $idR?>">
                          <input  type="hidden" name="idHistoria"  value="<?php echo $idHistoria?>">
                          <input  type="hidden" name="historiaClinica"  value="<?php echo $historiaClinica?>">
                          <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                          <d
                          <div align="center">
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-12">
                              <br>
                              <br>
                              <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>

                            </div>
                          </div>
                          <input type="hidden"  name="tipo_cliente"   valur="1">
                        </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>
 

