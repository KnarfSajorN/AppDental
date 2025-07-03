<?php
   include 'header.php';
   include 'menu.php';

$cliente_odonto_id = $_GET['cliente_odonto_id'];
$pzs = $_GET['pzs'];

echo $cliente_odonto_id;
echo $pzs;

 

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
// ----------------------------------------------------------------------------------------------------------------------------
       

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
        
        }


                  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
                  $nrowl=mysqli_num_rows($queryconfig);
                  while($rowconfig=mysqli_fetch_array($queryconfig))
                  {
                    $cie10 = $rowconfig['cie10'];
                    $pro1  = $rowconfig['pro1'];
                    $pro2  = $rowconfig['pro2'];
                  }



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Consulta Psicológica  
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta Psicológica  </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">


  <div class="col-md-12">




        <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
          <option selected="selected" value="">Seleccione tipo de consulta</option>
          <option>Consulta externa</option>
          <option>Urgencia</option>
          <option>Ambulatorio </option>
        </select>





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
                    <div class="box-body">
                     

         
              <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente;?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular;?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente;?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar;?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_CLIENTE;?></label>
               
               <br>
                <label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante;?></label>
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud;?></label>
               
              

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php calculaedad($fechaNacimiento);?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente ;?></label>

                <br>
                  <label><strong>Tipo de sangre :</strong></label>
                  <label><?php echo $tiposSangre ;?></label>   

                <br>

               <br>
                <label><strong>Seguro :</strong></label>
                <label><?php echo $seguro;?></label>
               
                 

              </div>

              <div class="col-md-2">

                <?php
                // echo strlen($logoF);
                if (strlen($fotoperfil) > 0) { 
                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                }
                else
                {

                echo '';
                }
                ?>
              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
 
              </div>  
<br>


              <div class="col-md-12">
<hr>  
</div>
              <div class="col-md-12">
              <div class="col-md-12">

                <label><strong>Toma algún medicamento:</strong></label>
                <label><?php echo $tomaMedicamento ;?></label>   
</div>
    <div class="form-group col-md-2" align="right">
      Alergias a las aines  <?php echo sino($ap1)?>
    </div>  
     
    <div class="form-group col-md-2" align="right">
      Asma <?php echo sino($ap2)?>
      
    </div>

    <div class="form-group col-md-2" align="right">
      HTA <?php echo sino($ap3)?>
     </div> 

    <div class="form-group col-md-2" align="right">
      Diabetes <?php echo sino($ap4)?>

    </div>
 
    <div class="form-group col-md-2" align="right">
      Hipotiroidismo <?php echo sino($ap5)?>
    
    </div>

    <div class="form-group col-md-2" align="right">
      Tabaquismo <?php echo sino($ap6)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Licor <?php echo sino($ap7)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Otras Alergias <?php echo sino($ap8)?>
 
    </div>

    <div class="form-group col-md-2" align="right">
      Cirugías <?php echo sino($ap9)?>
  
    </div>
    </div>


    <div class="form-group col-md-12" >
 
                <label><strong>Antecedentes Familiares:</strong></label>
                <label><?php echo $antecedentes;?></label>.
              <br>
                <label><strong>Alergias :</strong></label>
                <label><?php echo $alergias;?></label>

                <br>
               
                <label><strong>Notas adicionales :</strong></label>
                <label><?php echo $nota;?></label>.

              </div>
            
 



                    </div>
                  </div>
                </div>

 <form action="finalizar.php" method="POST" name="formularioActualizarcliente">




































<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->   












<div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2">
                       Problema Actual
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne2" class="panel-collapse collapse ">

                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Motivo De consulta - Problema actual:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>  
                   
                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Inicio y Curso (síntomas):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>  
                    
                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Episodios previos (inicio y curso – síntomas):</label>
                            <textarea class="form-control" rows="7" placeholder="Enter ..." style="border:1px solid #3c8dbc">Tiempo del Problema:
Que le Sucedió ese día:
El día Anterior:
Que Hizo:
Como se Calmo:
Hablo con Alguien del Problema:
</textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group has-purple">
                            <label>Factores desencadenantes del problema Actual (agravantes y repercusión en su vida
  social, riesgos para sí o los demás):
</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div> <br><br>


                        <table width="100%"> 
                          <tr>
                            <td colspan="4" align="center"><strong>Últimos Tratamientos Recibidos (físicos y psicológicos)</strong></td>
                          </tr>
                          <tr>
                            <td style="padding: 5px;" align="center">Fecha</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 5px;" align="center">Tipo:</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td style="padding: 5px;" align="center">Fecha</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 5px;" align="center">Tipo:</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td style="padding: 5px;" align="center">Fecha</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 5px;" align="center">Tipo:</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                          <tr>
                            <td style="padding: 5px;" align="center">Fecha</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                            <td style="padding: 5px;" align="center">Tipo:</td>
                            <td style="padding: 5px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          </tr>
                        </table>

                         <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Auto descripción de la Personalidad:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc">¿Cómo podría describir su personalidad?
¿Cual se su filosofía de vida?
</textarea>
                          </div>
                        </div>



                      </div> 
                    </div>
                </div>
</div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                       Historia Personal y Social
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Gestación (Pre – natalidad)</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                        </div>


<div class="col-md-6">
                        <label class="control-label" for="inputSuccess"> Edad de la madre al nacer: </label> <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>  
    </div>
<div class="col-md-6">

                        <label class="control-label" for="inputSuccess">Parto: </label> <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>  
    </div>


                        <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Tipo de atención:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                        </div>
                      <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Eutócico:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Distócico:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      </div>   
                       <div class="row">
                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">¿Por qué?:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <label class="control-label" for="inputSuccess">¿Fue a término?</label>
                          <div class="form-group">
                            <div class="radio">
                              <label>
                                <input type="radio" name="r2" class="minimal-red"  style="position: absolute; opacity: 0;">
                               Si
                              </label>
                              <label>
                               <input type="radio" name="r2" class="minimal-red"  style="position: absolute; opacity: 0;">
                               No
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Post natalidad:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                     
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Estatura al nacer:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
              
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Peso:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Perímetro Cefálico:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                      </div>

                       <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Toráxico:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                     
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Lloró</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
              
                      </div>
                      <div class="row">
                         <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Reflejos (...):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Desarrollo Psicomotor:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc">Lenguaje:
Juego:
                            </textarea>
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">A que Edad Caminó:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                       </div>

                       <table width="100%">
                        <tr>
                          <td colspan="6"><strong>Control de esfínteres:</strong> </td>
                        </tr>
                        <tr>
                          <td>Encopresis</td>
                          <td><input type="radio" name="encopresis" class="minimal-red"  style="position: absolute; opacity: 0;">
                               Si</td>
                          <td><input type="radio" name="encopresis" class="minimal-red"  style="position: absolute; opacity: 0;">
                               No</td>
                          <td align="right">Control a los&nbsp;&nbsp;&nbsp; </td>
                          <td  style="padding: 0px 10px 0px 2px;"><input type="text" class="form-control" id="inputSuccess" placeholder=""></td>
                          <td>Años</td>
                        </tr>
                        <tr>
                          <td>Enuresis</td>
                          <td ><input type="radio" name="enuresis" class="minimal-red"  style="position: absolute; opacity: 0;">
                               Si</td>
                          <td><input type="radio" name="enuresis" class="minimal-red"  style="position: absolute; opacity: 0;">
                               No</td>
                          <td align="right">Control a los&nbsp;&nbsp;&nbsp; </td>
                          <td  style="padding: 0px 10px 0px 2px;"><input type="text"   class="form-control" id="inputSuccess" placeholder=""></td>
                          <td>Años</td>
                        </tr>
                         
                       </table>

                        <div class="row" style="margin-top: 1%;">
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Motricidad fina:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Motricidad gruesa:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Movimiento de pinza:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                       </div>

                      <div class="row">
                         <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label> Alimentación infancia:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc">
                            </textarea>
                          </div>
                        </div>
                      </div> 
                        <h4>Crianza por parte de los padres:</h4>

                  
                        <div class="col-md-6" >
                          <div class="form-group has-purple">
                            <label> Solo Madre:</label>
                        <input type="checkbox" class="minimal-red" style="position: absolute; opacity: 0;">                          </div>
                        </div>
                        <div class="col-md-6" >
                          <div class="form-group has-purple">
                            <label>Solo Padre:</label>
                            <input type="checkbox" class="minimal-red" style="position: absolute; opacity: 0;">
                          </div>
                        </div>

                          <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Otros parientes (indicar):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label> Juego infantil:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc">Juega solo o con otros niños:
                             Amigos imaginarios.
                            </textarea>
                          </div>
                        </div> 
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Carácter y comportamiento en los primeros años:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12"><h4> Relación social (niñez):</h4></div>
                         <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Con los padres:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div> 
                          <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Con los hermanos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Otros familiares:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Conocidos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Extraños de la misma edad o diferente edad:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Grado de integración a ellos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                        <div class="col-md-12"><h4> Escolaridad</h4></div>

                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Ingreso a la escuela (¿se adaptó?):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Ingreso a la escuela (¿se adaptó?):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Comportamiento en el salón de clases:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">En las horas de esparcimiento: (recreo):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Relación con los demás:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Aislamiento:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                           <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Explique:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>


                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Experiencias durante los estudios primarios (recurso y apoyo, problemas de conducta, indisciplina):
</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div> 
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Dificultades académicas (cómo enfrentaba los exámenes):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Experiencias durante la secundaria: recurso y apoyo, problemas conducta indisciplina):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Dificultades académicas (cómo enfrentaba los exámenes):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Experiencias durante los estudios superiores (recurso y apoyo, problemas de conducta, indisciplina):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Dificultades académicas:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Problemas afectivos o conducta durante su niñez:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Problemas afectivos en la Pubertad, desde la pubescencia cuando se dan los cambios fisiológicos y aumento del Ritmo Maduracional (características Sexuales Primarias y Secundarias otras particularidades):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Particularidades de la adolescencia:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Problemas afectivos o de conducta en la Adolescencia:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Grado de armonía entre la Madurez Biológica y Psicológica:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Desarrollo de la Voluntad (rapidez, decisión y ejecución):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Grado de autonomía en la deliberación y la acción:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Persistencia en el esfuerzo:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Jerarquía de valores (concepción de la vida y el mundo):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Estilo de vida:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Sexualidad activa e inactiva:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Problemas legales:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Norma a nivel familiar:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Servicio Militar Obligatorio:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Preferencias en el SMO:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label> Hábitos e intereses (consumo de alcohol, drogas, etc.):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label> Enfermedad y accidentes (desde la niñez hasta la actualidad):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Elección de profesión u Oficio (libre, influenciado o forzado):</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12"><h4>Ambiente social Actual Trabajo (actual y anteriores):</h4></div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Vivienda:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Economía:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Relaciones con sus jefes, superiores, compañeros, subalternos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Crecimiento psicosocial:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Ambiciones laborales:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-6">
                            <label class="control-label" for="inputSuccess">Cambios de profesión, oficios o trabajo (frecuentes, circunstanciales y sus causas):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Cuadro Familiar:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Relaciones Interpersonales:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Religión:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Recreación:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Conducta sexual (inicio y vida sexual, desde los juegos infantiles a la actualidad) Relación con las personas del mismo sexo y del sexo opuesto:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12"><h4>Elección de la pareja</h4></div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">¿Le cuesta trabajo elegir pareja?:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-2">
                            <label class="control-label" for="inputSuccess">¿Fiel y exigente?:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Noviazgo (número y duración de ellos)</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Matrimonio (edad del paciente y la pareja)</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">¿Qué opina del matrimonio?:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Particularidades del día de la boda:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-4">
                            <label class="control-label" for="inputSuccess">Vida Matrimonial (armonía o desarmonía conyugal):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-2">
                            <label class="control-label" for="inputSuccess">Separación:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Divorcio (causas)</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Problemas y periodos críticos particularidades del climaterio, menopausia y edad crítica:</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc">Síntesis de lo encontrado:</textarea>
                          </div>
                        </div>


                        
                    </div>
                  </div>
                </div>





                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                      Antecedentes Familiares
                      </a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="box-body">
                        



  
                    <p>(Se señalan los datos correspondientes a la filiación de toda la parentela del paciente, relaciones familiares, carácter y personalidad, antecedentes clínicos Psicológicos y afines)</p>
                    <h3>Antecedentes Familiares</h3>
                    <h4>1. Rama Paterna:</h4>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Abuelo:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Abuela:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Padre:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Tíos paternos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                   <h4>1. Rama Materna:</h4>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Abuelo:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Abuela:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Padre:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>

                         <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Tíos paternos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Hermanos (as):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Esposo (a):</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label class="control-label" for="inputSuccess">Hijos:</label>
                            <div class="form-group has-success">
                              <input type="text" class="form-control" id="inputSuccess" placeholder="">
                            </div>
                          </div>
                          <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Colaterales (de manera general los datos de algún pariente colateral que haya
sufrido trastornos mentales u orgánicos, conducta delictiva, etc.)</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>





                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                      Sumario Diagnóstico-Resultado de Examen-Tratamiento y Evolución:
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
                      <h4>Síntesis de lo Encontrado:</h4>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Sumario Diagnóstico</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Examen Conducta y de las Facultades Psíquicas</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Evaluación Psicológica</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Programa de Tratamiento Propuesto</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 2%;">
                          <div class="form-group has-purple">
                            <label>Evolución</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #3c8dbc"></textarea>
                          </div>
                        </div>
                        


  


                    </div>
                  </div>
                </div>










              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     




























































<hr>  
 
                <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                  </div>
                   
                </div>




                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Fecha </label>
                  </div>
                  <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                  <div id="div-results"></div>
                </div>


                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Hora </label>
                  </div>
                 <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
           <div id="div-resultsHora"></div>

                </div>
                  
                <div class="col-sm-6">

                   <div align="left"> 
                    <label>Motivo consulta</label>
                  </div>
                  <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
 
                </div>
                 


<div class="col-sm-6">
 <label>Especialista </label>
                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                    <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                    <?php
                      usuariosAselect($ID);

                    ?>
                </select>

  </div>

<div class="col-sm-6">
                 
                <br>
                <br>
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" >
                 <i class="fa fa-user"></i>  Presencial  
                
                  <input type="radio" name="P" value="1"  class="flat-red"  >
                 <i class="fa fa-video-camera"></i>   Virtual
                </label>
              </div>



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
            
      		</form>


 


     
    </div>
    </div>
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
          
          
          
     

<?php include("footer.php")?>


<script type="text/javascript">

 
</script>