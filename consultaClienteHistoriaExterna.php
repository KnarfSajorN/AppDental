<?php 
   include 'header.php';
   include 'menu.php';

   function datosPacientesimpresion($clienteId) 
{
include 'conn3.php';
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

        $calculo_numerologico = $rowMotorizado['calculo_numerologico'];

    }

$text = '
<div class="box-body">
                          <div class="row">

                            <div class="col-md-6">
                              <label><strong>Correo:</strong></label>
                              <label> '.($correo_cliente).'  </label>

                              <br>
                              <label><strong>Nombre:</strong></label>
                              <label>'.$nombre_cliente.' </label>

                              <br>
                              <label><strong>Celular:</strong></label>
                              <label>'.($celular_cliente).'</label>

                              <br>
                              <label><strong>Ciudad:</strong></label>
                              <label>'.$ciudad_cliente.'</label>

                              <br>
                              <label><strong>Fecha registro:</strong></label>
                              <label>'.$fechar.'</label>

                              <br>
                              <label><strong>Cedula o ID:</strong></label>
                              <label>'.$CODI_CLIENTE.'</label>
<!--
                              <br>
                              <label><strong> Es donante:</strong></label>
                              <label>'.$esDonante.'</label> -->

                              <br>
                              <label><strong>Entidad de salud :</strong></label>
                              <label>'.$entidadSalud.'</label>
                              
                              
                            </div>

                            <div class="col-md-6">
                              

                              <label><strong> Fecha de nacimiento :</strong></label>
                              <label>'.$fechaNacimiento.'</label>
                              <br>
                              <label><strong> Calculo Numerologico :</strong></label>
                              <label>'.$calculo_numerologico.'</label>

                              <br>
                              <label><strong> Edad :</strong></label>
                              <label>'. calculaedad($fechaNacimiento).'</label>

                              <br>
                              <label><strong>Genero:</strong></label>
                              <label>'.$genero.'</label>
<!--
                              <br>
                              <label><strong>Profesión :</strong></label>
                              <label>'.$profesion_cliente.'</label>  -->

                              <br>
                              <label><strong>Tipo de sangre :</strong></label>
                              <label>'.$tiposSangre.'</label>

                              <br>
                              <label><strong>  Dirección cliente:</strong></label>
                              <label>'.$direccion_cliente.'</label>

                              <br>
                              <label><strong> Teléfono :</strong></label>
                              <label>'.($telefono_cliente).'</label>
                              
                              <!--<br>
                              <label><strong>Tiene alguna Discapacidad :</strong></label>
                              <label>'.$dis.'</label>-->

                              <!--<br>
                              <label><strong>Discapacidad:</strong></label>
                              <label>'.$tipodiscapacidad.'</label>-->

                              <br>
                              <label><strong>Ocupación :</strong></label>
                              <label>'.$ocupacion.'</label>


                            </div>
                          </div>
                        </div>
                        <hr>
                            ';








  return  $text;
}

   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Historias Externas 
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Historias Externas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">      
        <?php
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_SESSION['ID']; 
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $usuario_id=$rowMotorizado['usuario_id'];
              //$codigo_sistema_externo = $rowMotorizado['codigo_sistema_externo'];
              //$numero_historia_externa = $rowMotorizado['numero_historia_externa'];
              $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
            }
        ?>

        <div class="card-body">
          <div class="box-body">
            

            <br>

            <div  id="headerinfocliente" style="background-color:white;">
              <?php echo datosPacientesimpresion($clienteId);?>
            </div>

              <div class="box" id="tablas_historia">
                <?php

                
                 
                function tablas($valor)
                {
                  include 'funciones/conn3.php';
                  
                  echo '<ul class="nav nav-tabs">';
                  foreach ($valor as $key => $value) {
                    $QueryTabla=mysqli_query($conn3,"SHOW TABLE STATUS where Name='{$value}'");
                    while ($rowTabla= mysqli_fetch_array($QueryTabla)) 
                    {
                      $Tabla_Nombre[$key]=$rowTabla["Comment"];
                    }
                    if($Tabla_Nombre[$key]==""){$Tabla_Nombre[$key]=$value;}
                    if($key=="0")
                    {
                      echo '<li class="active"><a href="#'.$value.'" data-toggle="tab">'.$Tabla_Nombre[$key].'</a></li>';
                    }
                    else
                    {
                      echo '<li><a href="#'.$value.'" data-toggle="tab">'.$Tabla_Nombre[$key].'</a></li>';
                    }
                  }
                  echo '</ul>';
                }

                $tablasexportar=["HistoriaclinicaIncial","historiaclinicatratamiento","historiaclinicaocupacional","historiaclinicamedicinafisica","historiaclinicanutricional","historia_General"];

                tablas($tablasexportar);


                function tabla_contenido($valor,$campofiltro,$valorfiltro,$campofecha)
                {
                  include 'funciones/conn3.php';

                  foreach ($valor as $key => $value)
                  {

                    if($key=="0")
                    {
                      echo '<div class="tab-content">
                              <div class="tab-pane active" id="'.$value.'">';
                    }
                    else
                    {
                      echo '<div class="tab-pane" id="'.$value.'">';
                    }

                      $contador=0;        
                      $QueryDatos=mysqli_query($conn3,"SELECT * FROM ".$value." where ".$campofiltro."='{$valorfiltro}'" );
                      while($rowDatos=mysqli_fetch_array($QueryDatos,MYSQLI_ASSOC))
                      {
                        $contador++;
                        $fechahora=$rowDatos[$campofecha];
                        $HistoriaMedica="";

                        foreach ($rowDatos as $key1 => $value1) {
                          $HistoriaMedica.= '<b>'.$key1.'</b> : '.$value1.'<br>';
                        }
                      ?>

                          <div class="panel box box-primary">
                            <div class="box-header with-border" style="padding-left: 20px;">
                              <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $value.'_'.$contador?>">
                                  Fecha <?php echo $fechahora.' <strong>|</strong>';?> Historia # <?php echo $contador;?>
                                  <a href="javascript:imprSelec('<?php echo $value.'_'.$contador; ?>')"><i class="fa fa-print"></i></a>
                                </a>
                              </div>
                            </div>
                            <div id="<?php echo $value.'_'.$contador?>" class="panel-collapse collapse">
                              <div class="box-body">
                                <?php echo $HistoriaMedica;?>
                              </div>
                            </div>
                          </div>


                      <?php
                      } 
                      
                      echo "</div>";
                    
                  }
                  echo "</div>";
                }

                tabla_contenido($tablasexportar,'cedula',$CODI_CLIENTE,'fechahora');
                ?>

          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>
   <script type="text/javascript">
    function imprSelec(nombre) {
    var ficha1 = document.getElementById('headerinfocliente');
    var ficha2 = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write( ficha1.innerHTML+ficha2.innerHTML );
    ventimp.document.close();
    ventimp.print( );
    ventimp.close();
  }
   </script>