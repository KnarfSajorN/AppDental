<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
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
                
                    <form action="GuardarInfo_Rips.php" method="POST" name="formularioActualizarcliente">



                      
                          <div class="box-body">
                               <div class="form-group col-md-12">
                              <div align="left">Razón social o apellidos y nombre del prestador de servicios de salud</div>
                              <input type="text" class="form-control input-lg" id="nombre_prestador_servicios_ct" name="nombre_prestador_servicios_ct">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Código prestador de servicios</div>
                              <input type="text" class="form-control input-lg" id="codigo_prestador_servicios_ct" name="codigo_prestador_servicios_ct">
                            </div>

<div class="form-group col-md-3" align="left">
  <label>Tipo de identificación</label>
  <select id="tipo_id_principal" name="tipo_id_principal" class="form-control select2" style="width: 100%;">
    <option value="" selected> Seleccione</option>
    <option value="NI" > NI</option>
    <option value="CC" > CC</option>
    <option value="CE" > CE</option> 
    <option value="CD" > CD</option> 
    <option value="PA" > PA</option> 
    <option value="PE" > PE</option> 


  </select>

</div>

 <div class="form-group col-md-3">
                              <div align="left">Número de identificación</div>
                              <input type="text" class="form-control input-lg" id="id_prestador_servicios_ct" name="numeroId">
                            </div>



                            <div class="form-group col-md-3">
                              <div align="left">Fecha de remisión</div>
                              <input type="date" class="form-control input-lg" id="fecha_remision_ct" name="fecha_remision_ct">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Código del archivo</div>
                              <input type="text" class="form-control input-lg" id="codigo_archivo_ct" name="codigo_archivo_ct">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Total de registros</div>
                              <input type="text" class="form-control input-lg" id="totalRegistros" name="totalRegistros">
                            </div>

                          </div>
                        </div>
                   








                              <div class="form-group col-md-12">
                                <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
                              </div>

                          <hr>

                          <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                          <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                          <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                          <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                          <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                        
                          <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">

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

<script type="text/javascript">

</script>
 

