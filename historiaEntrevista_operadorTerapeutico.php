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
          <h1>Consulta médica</h1>
          <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Terapia Ocupacional</a></li>
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
                                      echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">'; }
                                      else
                                      { echo ''; }
                                      ?>
                                      <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
                                    </div>  
                            <br>

                                    <div class="col-md-12"><hr></div>
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
                      
                      <form action="guardar_historiaOperadorTerapeutico.php" method="POST" name="formularioActualizarcliente">

                              <div class="panel box box-success">
                                  <div class="box-header with-border">
                                      <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwoo">
                                          ENTREVISTA INDIVIDUAL PARA INGRESO A TRATAMIENTO POR OPERADOR TERAPEUTICO
                                        </a>
                                      </h4>
                                  </div>
                                  <div id="collapseTwoo" class="panel-collapse collapse">
                                    <div class="box-body">
                                      
                                              
 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Nivel de Estudios</label>
                          <select class="form-control" name="nivel">
                            <option>Seleccione..</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Universidad">Universidad</option>
                          </select>
                        </div>
                      </div>
                    

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">N° de grados o semestres cursados</label>
                          <input type="text" name="grados" class="form-control">
                        </div>
                      </div>
                     
<div class="form-group col-md-3">
                          <label class="control-label">Fecha de Ingreso</label>
                          <input class="form-control" type="date" name="tel" >
                        </div>
                      
                        <div class="form-group col-md-2">
                          <label class="control-label">Numero de Hijos</label>
                          <input class="form-control" type="text"  name="hijos" >
                        </div>
                        
                      </div>
<div class="row" align="center">
                                            
                                                  <label><b><h4> Datos del Acudiente</h4></b></label>
                                              
                                        </div> <br>
                                              
 <div class="row">


                      
                        <div class="form-group col-md-5">
                          <label class="control-label">Nombre de Acudiente</label>
                          <input class="form-control" type="text"  name="acudiene" >
                        </div>


                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Identificación</label>
                          <input type="text" name="ide" class="form-control">
                        </div>
                      </div>
                     
                        <div class="form-group col-md-2">
                          <label class="control-label">Telefono</label>
                          <input class="form-control" type="text" name="tel" >
                        </div>

<div class="form-group col-md-2">
                          <label class="control-label">Ocupación</label>
                          <input class="form-control" type="text" name="ocupacion" >
                        </div>
                      </div>



                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿ Actividades que realiza en tiempo libre? </b></label>
                                                  <textarea class="form-control"  name="tiempolibre" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      




<div class="row" align="center">
                                            
                                                  <label><h3> Información sobre el consumo de sustancias Psicoactivas </h3></label>
                                              
                                        </div> <br>



<div class="row" align="Left">
                                            
           <label><b> <h4> A). Sustancias de Inicio , Lugares y Compañias de Consumo</h4> </b></label>
                                              
                        </div> <br>

<div>     <div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga de Inicio</label>
                                                  </div>


                      <div class="col-md-2">
                       
                          <label class="control-label">Droga Secundaria</label>
                          
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga Terciaria</label>
                          
                        </div>
                          <div class="form-group col-md-2">
                          <label class="control-label">Droga de + IMP</label>
                        
                        </div>


                      <div class="col-md-2">
                       
                          <label class="control-label">Lugares</label>
                          
                       
                      </div>
                     
                        <div class="form-group col-md-2">
                          <label class="control-label">Compañias</label>
                         
                        </div>
                             </div>

<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                             Alcohol
                              <input value="Alcohol"
                               type="radio" name="rs1" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                             Alcohol
                              <input value="Alcohol"
                               type="radio" name="rs2" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Alcohol
                              <input value="Alcohol"
                               type="radio" name="rs3" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                             Alcohol
                              <input value="Alcohol"
                               type="radio" name="rs4" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Calle
                              <input value="Calle"
                               type="radio" name="rs5" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                            Solo
                              <input value="Solo"
                               type="radio" name="rs6" id="lt" class="flat-red"/> SI
                              
                            </div>

                             </div>


<div class="row">

                             <div class="form-group col-md-2" align="left">
                             Basuco
                              <input value="Basuco"
                               type="radio" name="rs7" id="lt" class="flat-red"/> SI
                              
                            </div>

                     <div class="form-group col-md-2" align="left">
                             Basuco
                              <input value="Basuco"
                               type="radio" name="rs8" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Basuco
                              <input value="Basuco"
                               type="radio" name="rs9" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Basuco
                              <input value="Basuco"
                               type="radio" name="rs10" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Parques
                              <input value="Parques"
                               type="radio" name="rs11" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                            Amigos
                              <input value="Amigos"
                               type="radio" name="rs12" id="lt" class="flat-red"/> SI
                              
                            </div>

                             </div>


<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                             Marihuana
                              <input value="Marihuana"
                               type="radio" name="rs13" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                             Marihuana
                              <input value="Marihuana"
                               type="radio" name="rs14" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Marihuana
                              <input value="Marihuana"
                               type="radio" name="rs15" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                            Marihuana
                              <input value="Marihuana"
                               type="radio" name="rs16" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Ollas
                              <input value="Ollas"
                               type="radio" name="rs17" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                            Familia
                              <input value="Familia"
                               type="radio" name="rs18" id="lt" class="flat-red"/> SI
                              
                            </div>

                           </div>
                             




<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                             Cocaína
                              <input value="Cocaina"
                               type="radio" name="rs19" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                             Cocaína
                              <input value="Cocaina"
                               type="radio" name="rs20" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Cocaína
                              <input value="Cocaina"
                               type="radio" name="rs21" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                            Cocaína
                              <input value="Cocaina"
                               type="radio" name="rs22" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Casa Propia
                              <input value="Casa Propia"
                               type="radio" name="rs23" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                            Compañero
                              <input value="Compañero"
                               type="radio" name="rs24" id="lt" class="flat-red"/> SI
                              
                            </div>

                           </div>


<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                             Sintéticas
                              <input value="Sinteticas"
                               type="radio" name="rs25" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                             Sintéticas
                              <input value="Sinteticas"
                               type="radio" name="rs26" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Sintéticas
                              <input value="Sinteticas"
                               type="radio" name="rs27" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                           Sintéticas
                              <input value="Sinteticas"
                               type="radio" name="rs28" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Casa Amigos
                              <input value="Casa Amigos"
                               type="radio" name="rs29" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                           Desconocidos
                              <input value="Desconocidos"
                               type="radio" name="rs30" id="lt" class="flat-red"/> SI
                              
                            </div>

                           </div>

<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                            Heroína
                              <input value="Heroina"
                               type="radio" name="rs31" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                            Heroína
                              <input value="Heroina"
                               type="radio" name="rs32" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Heroína
                              <input value="Heroina"
                               type="radio" name="rs33" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                          Heroína
                              <input value="Heroina"
                               type="radio" name="rs34" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            Montes
                              <input value="Montes"
                               type="radio" name="rs35" id="lt" class="flat-red"/> SI
                              
                            </div>

<div class="form-group col-md-2" align="left">
                          Otros
                              <input value="Otros"
                               type="radio" name="rs36" id="lt" class="flat-red"/> SI
                              
                            </div>

                           </div>


<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                            Inhalantes
                              <input value="Inhalantes"
                               type="radio" name="rs37" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                           Inhalantes
                              <input value="Inhalantes"
                               type="radio" name="rs38" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                             Inhalantes
                              <input value="Inhalantes"
                               type="radio" name="rs39" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                         Inhalantes
                              <input value="Inhalantes"
                               type="radio" name="rs40" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            
                            </div>

<div class="form-group col-md-2" align="left">
                         
                            </div>

                           </div>


<div class="row">

                    
                            <div class="form-group col-md-2" align="left">
                           Nicotina
                              <input value="Nicotina"
                               type="radio" name="rs41" id="lt" class="flat-red"/> SI
                              
                            </div>


                     <div class="form-group col-md-2" align="left">
                          Nicotina
                              <input value="Nicotina"
                               type="radio" name="rs42" id="lt" class="flat-red"/> SI
                              
                            </div>

 <div class="form-group col-md-2" align="left">
                            Nicotina
                              <input value="Nicotina"
                               type="radio" name="rs43" id="lt" class="flat-red"/> SI
                              
                            </div>


 <div class="form-group col-md-2" align="left">
                         Nicotina
                              <input value="Nicotina"
                               type="radio" name="rs44" id="lt" class="flat-red"/> SI
                              
                            </div>
 <div class="form-group col-md-2" align="left">
                            
                            </div>

<div class="form-group col-md-2" align="left">
                         
                            </div>

                           </div>
                          


                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones </b></label>
                                                  <textarea class="form-control"  name="observac" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      


<div class="row" align="Left">
                                            
           <label><b> <h4> B). Detalles del consumo, dosis y frecuencias </h4> </b></label>
                                              
                        </div> <br>


 <div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Frecuencia consumo</label>
                                                  </div>


                      <div class="col-md-2">
                       
                          <label class="control-label">1 Vez/Semana</label>
                          
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <label class="control-label">1-2 veces/semana</label>
                          
                        </div>
                          <div class="form-group col-md-2">
                          <label class="control-label">+3 veces/semana</label>
                        
                        </div>


                      <div class="col-md-2">
                       
                          <label class="control-label">Diariamente</label>
                          
                       
                      </div>
                     
                        <div class="form-group col-md-2">
                          <label class="control-label">Dosis consumo</label>
                         
                        </div>
                             </div>




<div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga de INICIO</label>
                                                  </div>


                      <div class="col-md-2">
                         <input class="form-control" type="text" name="unavez1" >
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="dosvez1" >
                          </div>

                          <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="mas3veces1" >
                           </div>

                      <div class="col-md-2">
                       
                         <input class="form-control" type="text" name="diariamente1" >
                      </div>
                     
                        <div class="form-group col-md-2">
                           <input class="form-control" type="text" name="dosis1" >
                         
                        </div>
                             </div>


<div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga Secundaria</label>
                                                  </div>


                      <div class="col-md-2">
                       
                          <input class="form-control" type="text" name="unavez2" >
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="dosvez2" >
                          
                        </div>
                          <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="mas3veces2" >
                        
                        </div>


                      <div class="col-md-2">
                       
                         <input class="form-control" type="text" name="diariamente2" >
                      </div>
                     
                        <div class="form-group col-md-2">
                           <input class="form-control" type="text" name="dosis2" >
                         
                        </div>
                             </div>





<div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga Terciaria</label>
                                                  </div>


                      <div class="col-md-2">
                       
                          <input class="form-control" type="text" name="unavez3" >
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="dosvez3" >
                          
                        </div>
                          <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="mas3veces4" >
                        
                        </div>


                      <div class="col-md-2">
                       
                         <input class="form-control" type="text" name="diariamente3" >
                      </div>
                     
                        <div class="form-group col-md-2">
                           <input class="form-control" type="text" name="dosis3" >
                         
                        </div>
                             </div>


<div class="row">

                    
                        <div class="form-group col-md-2">
                          <label class="control-label">Droga de + Impacto</label>
                                                  </div>


                      <div class="col-md-2">
                       
                          <input class="form-control" type="text" name="unavez4" >
                        </div> 
                     
                        <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="dosvez4" >
                          
                        </div>
                          <div class="form-group col-md-2">
                          <input class="form-control" type="text" name="mas3veces4" >
                        
                        </div>


                      <div class="col-md-2">
                       
                         <input class="form-control" type="text" name="diariamente4" >
                      </div>
                     
                        <div class="form-group col-md-2">
                           <input class="form-control" type="text" name="dosis4" >
                         
                        </div>
                             </div>





                                        <div class="row">
                                                               <div class="col-md-12">
                                                <div class="form-group">

                                      <label><b> Observaciones</b></label>
                                     <textarea class="form-control"  name="Observaciones" rows="3" ></textarea>
                                      </div>

                                  </div> </div> 

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Dias de mayor consumo</label>
                          <input type="text" name="dias" class="form-control">
                        </div>
                      </div>
<div class="col-md-9">
                        <div class="form-group">
                          <label class="control-label">Por que?</label>
                          <input type="text" name="porq" class="form-control">
                        </div>
                      </div>


<div class="form-group col-md-5" align="left">
                            Ha recibido tratamiento parala adicción?
                              <input value="SI"
                               type="radio" name="tratamiento" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="tratamiento" id="lt" class="flat-red"/> NO
                            </div>
<div class="col-md-7">
                        <div class="form-group">
                          <label class="control-label">Entidad:</label>
                          <input type="text" name="Entidad" class="form-control">
                        </div>
                      </div>

   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Tipo de tratamiento</b></label>
                                                                                                 </div>
                                            </div>
                                      
<div class="form-group col-md-4" align="left">
                            Teoterapia
                              <input value="Teoterapia"
                               type="radio" name="Teoterapia" id="lt" class="flat-red"/> SI
                               <input value="NO  Teoterapia"
                               type="radio" name="Teoterapia" id="lt" class="flat-red"/> NO
                            </div>

<div class="form-group col-md-4" align="left">
                            Clin. psiquiatrico
                              <input value="Clin. psiquiatrico"
                               type="radio" name="psiquiatrico" id="lt" class="flat-red"/> SI
                               <input value="NO Clin. psiquiatrico"
                               type="radio" name="psiquiatrico" id="lt" class="flat-red"/> NO
                            </div>
<div class="form-group col-md-4" align="left">
                            Comu. Terapeutica
                              <input value="Comu. Terapeutica"
                               type="radio" name="Terapeutica" id="lt" class="flat-red"/> SI
                               <input value="NO Comu. Terapeutica"
                               type="radio" name="Terapeutica" id="lt" class="flat-red"/> NO
                            </div>

                            <div class="form-group col-md-6" align="left">
                            Clinico
                              <input value="Comu. Terapeutica"
                               type="radio" name="Clinico" id="lt" class="flat-red"/> SI
                               <input value="NO Comu. Terapeutica"
                               type="radio" name="Clinico" id="lt" class="flat-red"/> NO
                            </div>
<div class="form-group col-md-6" align="left">
                            Otro
                              <input value="Otro"
                               type="radio" name="Otro" id="lt" class="flat-red"/> SI
                               <input value="NO Otro"
                               type="radio" name="Otro" id="lt" class="flat-red"/> NO
                            </div>





<div class="row" align="Left">
                                            
           <label><b> <h4> C). Consecuencias del consumo (Describa el impacto del consumo en su vida) </h4> </b></label>
                                              
                        </div> <br>

   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>A nivel físico </b></label>
                                                  <textarea class="form-control"  name="nivelfísico" rows="2" ></textarea>
                                                </div>
                                            </div>
           <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>A nivel familiar </b></label>
                                                  <textarea class="form-control"  name="nivelfamiliar" rows="2" ></textarea>
                                                </div>
                                            </div>                              
   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>A nivel Social </b></label>
                                                  <textarea class="form-control"  name="nivelSocial" rows="2" ></textarea>
                                                </div>
                                            </div>
  <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Deteriodo Presentado:</b></label>
                                                  <textarea class="form-control"  name="deteriodo" rows="2" ></textarea>
                                                </div>
                                            </div>

 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Cuando cosideró que el consumo de drogas era un problema? </b></label>
                                                  <textarea class="form-control"  name="consumo" rows="2" ></textarea>
                                                </div>
                                            </div>



<div class="row" align="center">
                                            
                                                  <label><h3> Estado de Salud </h3></label>
                                              
                                        </div> <br>

<div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Marque cada casilla (SI O NO) y describa el detalle en cada fila en caso de ser afirmativo</b></label>
                                                 
                                                </div>
                                            </div>




<div class="form-group col-md-5" align="left">
                            ¿Padece alguna enfermedad actualmente?
                              <input value="SI Padece alguna enfermedad actualmente"
                               type="radio" name="enfermedad" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="enfermedad" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle1" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>


<div class="form-group col-md-5" align="left">
                            ¿Tiene seguro social?
                              <input value="SI Tiene seguro social"
                               type="radio" name="seguro" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="seguro" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle2" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>



<div class="form-group col-md-5" align="left">
                            ¿Ha recibido tx psicológico?
                              <input value="SI Ha recibido tx psicológico"
                               type="radio" name="txpsicologico" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="txpsicologico" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle3" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>
<div class="form-group col-md-5" align="left">
                            ¿Ha recibido tx psiquiátrico?
                              <input value="SI Ha recibido tx psiquiátrico"
                               type="radio" name="txpsiquiatrico" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="txpsiquiatrico" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle4" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>
<div class="form-group col-md-5" align="left">
                            ¿Ha tenido examen medico general?
                              <input value="SI Ha tenido examen medico"
                               type="radio" name="examenmedico" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="examenmedico" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle5" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>

<div class="form-group col-md-5" align="left">
                            ¿Toma medicinas actualmente?
                              <input value="SI Toma medicinas"
                               type="radio" name="Tomamedicinas" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="Tomamedicinas" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle6" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>
<div class="form-group col-md-5" align="left">
                            ¿Se ha tomado prueba de Elisa?
                              <input value="SI  ha tomado prueba de Elisa"
                               type="radio" name="Elisa" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="Elisa" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle7" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>
<div class="form-group col-md-5" align="left">
                           ¿Ha tenido cirugías?
                              <input value="SI Ha tenido cirugias"
                               type="radio" name="cirugias" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="cirugias" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle8" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>
<div class="form-group col-md-5" align="left">
                           ¿Ha sido hospitalizado alguna vez?
                              <input value="SI Ha sido hospitalizado"
                               type="radio" name="hospitalizado" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="hospitalizado" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle9" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>






<br> <br><br>



<div class="row" align="center">
                                            
                                                  <label><h3> Actitud Frente al Proceso</h3></label>
                                              
                                        </div> <br>





<div class="form-group col-md-12" align="left">
                            ¿Su ingreso al programa es voluntario? y por que quiere cambiar?
                              <input value="SI"
                               type="radio" name="voluntario" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="voluntario" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="detalle10" class="form-control"   placeholder="¿Por qué?">
                        </div>
                      </div>


 <!--<div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Que presión lo indujo a la búsqueda del proceso? </b></label>
                                                  <textarea class="form-control"  name="presion" rows="3" ></textarea>
                                                </div>
                                            </div>  -->
                                      





<div class="form-group col-md-5" align="left">
                            ¿Tiene problemas con la justicia?
                              <input value="SI"
                               type="radio" name="justicia" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="justicia" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="Detalle11" class="form-control"   placeholder="Detalle que tipo de problemas">
                        </div>
                      </div>



<div class="form-group col-md-5" align="left">
                           ¿Considera usted la necesidad de un tratamiento?
                              <input value="SI"
                               type="radio" name="necesidad" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="necesidad" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="detalle12" class="form-control"   placeholder="Por que?">
                        </div>
                      </div>

 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿Que expectativas tiene frente al programa?</b></label>
                                                  <textarea class="form-control"  name="expectativas" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Cuál cree usted que será la mayor dificultad para dejar de usar drogas?</b></label>
                                                  <textarea class="form-control"  name="dificultad" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      
 <!--<div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>observaciones del Operador Terapeutico  sobre  la actitud del usuario frente al proceso</b></label>
                                                  <textarea class="form-control"  name="Operador Terapeutico" rows="3" ></textarea>
                                                </div>
                                            </div>-->
                                      


<div class="row" align="Left">
                                            
           <label><b> <h4> A). Cuestionario de metas </h4> </b></label>
                                              
                        </div> <br>


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Seleccione cinco metas de la siguiente lista numerándolas en orden de importancia:</b></label>
                                                  
                                                </div>
                                            </div>
                                      
<br><br>



 <div class="row">
                      
                    

                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">suspender el consumo</label>
                         
                        </div>
                      </div>
                     

                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="suspenderconsumo" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">recuperar dominio sobre si mismo</label>
                        </div>
                     


  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="dominio" >
                        </div>


 </div>

 <div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Cambiar de estilo de vida</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="estilo" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Elevar el autoestima si mismo</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="autoestima" >
                        </div>


 </div>



 <div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Mejorar relaciones interpersonales</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="interpersonales" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Adquirir un estilo de vida sano</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="estilovida" >
                        </div>


 </diV>



 <div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Recuperar a la familia</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="Recuperarfamilia" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Cambiar el sistema de creencias</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="creencia" >
                        </div>


 </diV>
<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Mejorar el aspecto fisico</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="aspectofisico" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Trabajar problemas que me afectan</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="problemas" >
                        </div>


 </div>


<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Recuperar el empleo</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="empleo" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Cambiar conductas agresivas</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="conductasagresiva" >
                        </div>


 </div>


<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Manejar el consumo</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="consumo" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Recuperar confianza en la familia</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="confianza" >
                        </div>


 </div>


<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Recuperar capacidades perdidas por el consumo</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="capacidades" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Consumir de vez en cuando ( solo en fiestas)</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="Consumir" >
                        </div>


 </div>

<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Lograr beneficios ofrecidos por la familia</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="beneficios" >
                        </div>

                        <div class="form-group col-md-5">
                          <label class="control-label">Aprender a enfrentar los problemas</label>
                        </div>
       
  <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="enfrentar" >
                        </div>


 </div>


<div class="row">
                <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Adquirir estatus o posición social</label>
                         
                        </div>
                      </div>
                    
                        <div class="form-group col-md-1">
                          <input class="form-control" type="text"  name="estatus" >
                        </div>

                        <div class="form-group col-md-5">
                                                  </div>
       
                         <div class="form-group col-md-1">
                                                  </div>

 </div>
<br><br>

<div class="row" align="center">
                                            
                                                  <label><h3> Aspecto espiritual </h3></label>
                                              
                                        </div> <br>






<div class="form-group col-md-5" align="left">
                           ¿cree usted en Dios?
                              <input value="SI"
                               type="radio" name="creeDios" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="creeDios" id="lt" class="flat-red"/> NO
                            </div>


<div class="col-md-7">
                        <div class="form-group">
                          <label class="control-label">A que religión pertenece?</label>
                            <input type="text" name="religion" class="form-control"   placeholder="Detalle">
                        </div>
                      </div>



 <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>¿Por que cree en Dios? </b></label>
                                                  <textarea class="form-control"  name="dios" rows="3" ></textarea>
                                                </div>
                                            </div>  
                                      
  <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Como cree usted que la parte espiritual tiene que ver con su proceso de tratamiento?</b></label>
                                                  <textarea class="form-control"  name="partespiritual" rows="3" ></textarea>
                                                </div>
                                            </div>   -->


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones sobre el aspecto espiritual</b></label>
                                                  <textarea class="form-control"  name="aspectoespiritual" rows="3" ></textarea>
                                                </div>
                                            </div>

 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Notas preliminares</b></label>
                                                  <textarea class="form-control"  name="preliminares" rows="3" ></textarea>
                                                </div>
                                           
</div>

<div class="row" align="center">
                                            
                                                  <label><h3>Observaciones generales del Operador Terapeutico (síntesis de la entrevista) </h3></label>
                                              
                                        </div> <br>

 <div class="col-md-12">
                                                <div class="form-group">
                                                 
                                                  <textarea class="form-control"  name="sintesis" rows="3" ></textarea>
                                                </div>
                                           
</div>


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Descripción de las limitaciones físicas y/o mentales al momento de la entrevista</b></label>
                                                  <textarea class="form-control"  name="limitaciones" rows="3" ></textarea>
                                                </div>
                                           
</div>

 <!--<div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Notas e impresiones del Operador Terapeutico</b></label>
                                                  <textarea class="form-control"  name="Notasimpresiones" rows="3" ></textarea>
                                                </div>  
                                           
</div>

<div class="row" align="center">
                                            
                                                  <label><h3> Aspectos sobre la Admisión </h3></label>
                                              
                                        </div> <br>



<div class="form-group col-md-12" align="left">
                           El aspirante ha sido informado sobre el programa y sus normas?
                              <input value="SI"
                               type="radio" name="aspirante" id="lt" class="flat-red"/> SI
                               <input value="NO"
                               type="radio" name="aspirante" id="lt" class="flat-red"/> NO
                            </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Ingreso autorizado por</label>
                          <input type="text" name="Ingreso" class="form-control">
                        </div>
                      </div>

<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Remitido Sede</label>
                          <input type="text" name="RemitidoSede" class="form-control">
                        </div>
                      </div>



   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Condicionamientos para el ingreso </b></label>
                                                  <textarea class="form-control"  name="Condicionamientos" rows="3" ></textarea>
                                                </div>
                                            </div>  -->
    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Nombre del Operador Terapeutico</label>
                          <input type="text" name="NombreOperador Terapeutico" class="form-control">
                        </div>
                      </div >                                 

<br> <br><br>



























 <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>
                    <br>




                                  
                                  <div class="row">
                                    <div class="col-sm-12">
                                    <div align="center"> 
                                      <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                                    </div>
                                  </div>
                   
                                  <div class="col-sm-6">
                                      <div align="left"><label>Fecha </label></div>
                                      <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                                      <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                                      <div id="div-results"></div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div align="left"><label>Hora </label></div>
                                    <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                                    <div id="div-resultsHora"></div>
                                  </div>
                                    
                                  <div class="col-sm-6">
                                    <div align="left"><label>Motivo consulta</label></div>
                                    <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                                  </div>

                                  <div class="col-sm-6">
                                    <label>Especialista </label>
                                    <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
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
                                        <input type="radio" name="P" value="0" class="flat-red" checked>
                                      <i class="fa fa-user"></i>  Presencial  
                                  
                                        <input type="radio" name="P" value="SI"
                                class="flat-red"  >
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
                                  <br><br><br>
                                  <div class="col-sm-12">
                                    <br><br>
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
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>  
          
          
          
     

<?php include("footer.php")?>

