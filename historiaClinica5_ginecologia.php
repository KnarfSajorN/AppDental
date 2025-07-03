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
      <h1>
       Consulta médica 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta médica </a></li>
        

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







 <form action="guardarHistoriaClinica5_ginecologia.php" method="POST" name="formularioActualizarcliente">

 

                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
                        Examen Obtetrico
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      
                <div class="form-group col-md-4">
                  <div align="left">Motivo de la Consulta:</div>
                  <input type="text" class="form-control input-lg" id="motivo_c" name="motivo_c" placeholder="Motivo de la Consulta">
                </div>  
                <div class="form-group col-md-12">
                  <label> Enfermedad Actual: </label>
                    <textarea id="enfermedad_actual" name="enfermedad_actual" class="textarea" placeholder="Enfermedad Actual" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
              </div>  

                <div class="form-group col-md-12">     
                  <label><strong>  Diagnostico Provisional  </strong></label>
                  <textarea class="form-control" id="diagnostico_p" name="diagnostico_p" rows="4">1.
2.
                  </textarea>
                </div> 

                <div class="col-md-12"> <font size="1">Antecedentes Hereditarios   </font></div>
               <div class="form-group col-md-3">
                  <div align="left">Fímico (TB)</div>
                  <input type="text" class="form-control input-lg" id="fimico" name="fimico" placeholder="Fímico (TB)">
                </div>
                <div class="form-group col-md-3">
                  <div align="left">Leuticos (Sífilis)</div>
                  <input type="text" class="form-control input-lg" id="leuticos" name="leuticos" placeholder="Leuticos (Sífilis)">
                </div> 
                <div class="form-group col-md-3">
                  <div align="left">Alcohólicos</div>
                  <input type="text" class="form-control input-lg" id="alcoholicos" name="alcoholicos" placeholder="Alcohólicos">
                </div> 
                <div class="form-group col-md-3">
                  <div align="left">Neuropáticos</div>
                  <input type="text" class="form-control input-lg" id="neuropaticos" name="neuropaticos" placeholder="Neuropáticos">
                </div> 
                <div class="form-group col-md-3">
                  <div align="left">Otros Procesos</div>
                  <input type="text" class="form-control input-lg" id="otros_p" name="otros_p" placeholder="Otros Procesos">
                </div> 
                <div class="form-group col-md-3">
                  <div align="left">Embarazos Multiples</div>
                  <input type="text" class="form-control input-lg" id="embarazos_m" name="embarazos_m" placeholder="Embarazos Multiples">
                </div>  

                <div class="col-md-12"> <font size="1">Antecedentes Personales   </font></div> 
                <div class="form-group col-md-12">     
                  <label><strong>  Antecedentes Personales</strong></label>
                  <textarea class="form-control" id="antecedentes__p" name="antecedentes__p" rows="5">Menarquía a los:
                  Primeras Relaciones Sexuales:
                  Generales:
                  Ginecológicos:
                  Quirúrgicos:
                  </textarea>
                </div> 

                <div class="col-md-12"> <font size="1">Antecedentes Obstétricos   </font></div> 
                <div class="form-group col-md-2">
                <div align="left">Embarazo</div>
                  <input type="text" class="form-control input-lg" id="embarazo" name="embarazo" placeholder="Embarazo">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Año</div>
                  <input type="text" class="form-control input-lg" id="anno" name="anno" placeholder="Año">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Tipo de Parto</div>
                  <input type="text" class="form-control input-lg" id="tipo_parto" name="tipo_parto" placeholder="Tipo de Parto">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Hemorragia</div>
                  <input type="text" class="form-control input-lg" id="hemorragia" name="hemorragia" placeholder="Hemorragia">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Lesión Perineal</div>
                  <input type="text" class="form-control input-lg" id="lesion_p" name="lesion_p" placeholder="Lesión Perineal">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Puerperio</div>
                  <input type="text" class="form-control input-lg" id="puerperio" name="puerperio" placeholder="Puerperio">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Peso del Niño</div>
                  <input type="text" class="form-control input-lg" id="peso_nn" name="peso_nn" placeholder="Peso del Niño">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Vivo o Muerto</div>
                  <input type="text" class="form-control input-lg" id="vivo_m" name="vivo_m" placeholder="Vivo o Muerto">
                </div>
                <div class="form-group col-md-2">
                <div align="left">Sexo</div>
                  <input type="text" class="form-control input-lg" id="sexo" name="sexo" placeholder="Sexo">
                </div>
               </div>
           </div>
           </div>


             <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapsefour">
                        Examen Físico
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group col-md-2">
                        <div align="left">Aspecto General</div>
                          <input type="text" class="form-control input-lg" id="aspecto_g" name="aspecto_g" placeholder="Aspecto General">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Piel</div>
                          <input type="text" class="form-control input-lg" id="piel" name="piel" placeholder="Piel">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Funciones Nerviosas</div>
                          <input type="text" class="form-control input-lg" id="funciones_n" name="funciones_n" placeholder="Funciones Nerviosas">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Aparato Digestivo</div>
                          <input type="text" class="form-control input-lg" id="aparato_d" name="aparato_d" placeholder="Aparato Digestivo">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Aparato Circulatorio</div>
                          <input type="text" class="form-control input-lg" id="aparato_c" name="aparato_c" placeholder="Aparato Circulatorio">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Aparato Respiratorio</div>
                          <input type="text" class="form-control input-lg" id="aparato_r" name="aparato_r" placeholder="Aparato Respiratorio">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Ex. Pulmonar</div>
                          <input type="text" class="form-control input-lg" id="ex_p" name="ex_p" placeholder="Ex. Pulmonar">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Aparato Urinario</div>
                          <input type="text" class="form-control input-lg" id="aparato_u" name="aparato_u" placeholder="Aparato Urinario">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Aparato Locomotor</div>
                          <input type="text" class="form-control input-lg" id="aparato_l" name="aparato_l" placeholder="Aparato Locomotor">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Varices</div>
                          <input type="text" class="form-control input-lg" id="varices" name="varices" placeholder="Varices">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Edemas</div>
                          <input type="text" class="form-control input-lg" id="edemas" name="edemas" placeholder="Edemas">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Senos</div>
                          <input type="text" class="form-control input-lg" id="senos" name="senos" placeholder="Senos">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Abdomen</div>
                          <input type="text" class="form-control input-lg" id="abdomen" name="abdomen" placeholder="Abdomen">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Vulva y Periné</div>
                          <input type="text" class="form-control input-lg" id="vulva_p" name="vulva_p" placeholder="Vulva y Periné">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Vagina</div>
                          <input type="text" class="form-control input-lg" id="vagina" name="vagina" placeholder="Vagina">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Útero y Anexos</div>
                          <input type="text" class="form-control input-lg" id="utero_a" name="utero_a" placeholder="Útero y Anexos">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Sistema Ganglionar</div>
                          <input type="text" class="form-control input-lg" id="sistema_g" name="sistema_g" placeholder="Sistema Ganglionar">
                      </div>
                      <div class="form-group col-md-2">
                        <div align="left">Otros</div>
                          <input type="text" class="form-control input-lg" id="otros1" name="otros1" placeholder="Otros">
                      </div>


            <div class="col-md-6">
              <div class="box-group" id="LadoIzquierdo">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#LadoIzquierd" href="#EstadoFisico">
                        Estado Fisico
                      </a>
                    </h4>
                  </div>
                  <div id="EstadoFisico" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group col-md-3">
                        <div align="left">Peso Previo</div>
                          <input type="text" class="form-control input-lg" id="peso_p" name="peso_p" placeholder="Peso Previo">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Peso Actual</div>
                          <input type="text" class="form-control input-lg" id="peso_a" name="peso_a" placeholder="Peso Actual">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Talla</div>
                          <input type="text" class="form-control input-lg" id="talla" name="talla" placeholder="Talla">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Temperatura</div>
                          <input type="text" class="form-control input-lg" id="temperatura" name="temperatura" placeholder="Temperatura">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Pulso</div>
                          <input type="text" class="form-control input-lg" id="pulso" name="pulso" placeholder="Pulso">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Respiración</div>
                          <input type="text" class="form-control input-lg" id="respiracion" name="respiracion" placeholder="Respiración">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">TA</div>
                          <input type="text" class="form-control input-lg" id="TA" name="ta" placeholder="TA">
                      </div>
                      </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#LadoIzquierd" href="#hemato">
                       Hematología
                      </a>
                    </h4>
                  </div>
                   <div id="hemato" class="panel-collapse collapse">
                    <div class="box-body">
                     
                      <div class="form-group col-md-3">
                        <div align="left">Glóbulos Rojos</div>
                          <input type="text" class="form-control input-lg" id="globulos_r" name="globulos_r" placeholder="Glóbulos Rojos">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">Otros</div>
                          <input type="text" class="form-control input-lg" id="otrosv1" name="otrosv1" placeholder="Otros">
                      </div>  
                      <div class="form-group col-md-3">
                        <div align="left">Glóbulos Blancos</div>
                          <input type="text" class="form-control input-lg" id="globulos_b" name="globulos_b" placeholder="Glóbulos Blancos">
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Glicemia</div>
                          <input type="text" class="form-control input-lg" id="glicemia" name="glicemia" placeholder="Glicemia">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">Hemoglobina</div>
                          <input type="text" class="form-control input-lg" id="hemoglobina" name="hemoglobina" placeholder="Hemoglobina">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">Uroanálisis</div>
                          <input type="text" class="form-control input-lg" id="uroanalisis" name="uroanalisis" placeholder="Uroanálisis">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">Hematocrito</div>
                          <input type="text" class="form-control input-lg" id="hematocrito" name="hematocrito" placeholder="Hematocrito">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">Coproanálisis</div>
                          <input type="text" class="form-control input-lg" id="coproanalisis" name="coproanalisis" placeholder="Coproanálisis">
                      </div>

                      </div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-md-6">
              <div class="box-group" id="LadoDerecho">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#LadoDerecho" href="#Control1">
                       Control Prenatal
                      </a>
                    </h4>
                  </div>
                  <div id="Control1" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="form-group col-md-3">
                        <div align="left">Amenorrea desde:</div>
                          <input type="text" class="form-control input-lg" id="amenorrea" name="amenorrea" placeholder="Amenorrea desde">
                      </div>   
                      <div class="form-group col-md-3">
                        <div align="left">Parto probable</div>
                          <input type="text" class="form-control input-lg" id="parto_p" name="parto_p" placeholder="Parto probable">
                      </div>   
                      <div class="form-group col-md-3">
                        <div align="left">Paridad</div>
                          <input type="text" class="form-control input-lg" id="paridad" name="paridad" placeholder="Paridad">
                      </div>   

                      <div class="form-group col-md-3">
                        <div align="left">Donde hizo prenatal</div>
                          <input type="text" class="form-control input-lg" id="donde_h_p" name="donde_h_p" placeholder="Donde hizo prenatal">
                      </div> 
                      <div class="form-group col-md-3">
                        <div align="left">N° de Consultas</div>
                          <input type="text" class="form-control input-lg" id="numero_c" name="numero_c" placeholder="N° de Consultas">
                      </div> 
                      <div class="form-group col-md-12">     
                          <label><strong>Resumen de Importancia</strong></label>
                          <textarea class="form-control" id="resumen_i" name="resumen_i" rows="5">
                          </textarea>
                      </div> 
                    

                      </div>
                  </div>
                </div>
              <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#LadoDerecho" href="#exploracion">
                       Exploración Útero-Abdominal a la Admisión
                      </a>
                    </h4>
                  </div>
                  <div id="exploracion" class="panel-collapse collapse">
                    <div class="box-body">
                     
                      <div class="form-group col-md-4">
                        <div align="left">Día</div>
                          <input type="text" class="form-control input-lg" id="dia" name="dia" placeholder="Día">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Altura Uterina</div>
                          <input type="text" class="form-control input-lg" id="altura_u" name="altura_u" placeholder="Altura Uterina">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Circunferencia Abdominal</div>
                          <input type="text" class="form-control input-lg" id="circunferencia_a" name="circunferencia_a" placeholder="Circunferencia Abdominal">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Presentación</div>
                          <input type="text" class="form-control input-lg" id="presentacionv1" name="presentacionv1" placeholder="Presentación">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Encajamiento</div>
                          <input type="text" class="form-control input-lg" id="encajamiento" name="encajamiento" placeholder="Encajamiento">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Auscultación del Foco</div>
                          <input type="text" class="form-control input-lg" id="auscultacion_foco" name="auscultacion_foco" placeholder="Auscultación del Foco">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Edad</div>
                          <input type="text" class="form-control input-lg" id="edad" name="edad" placeholder="Edad">
                      </div> 
                      <div class="form-group col-md-4">
                        <div align="left">Particularidades</div>
                          <input type="text" class="form-control input-lg" id="particularidades" name="particularidades" placeholder="Particularidades">
                      </div> 


                      </div>
                  </div>
                </div>

              </div>
          </div>
                <div class="form-group col-md-12"></div>

                <div class="form-group col-md-6">
                    <div align="left">Evolución</div>
                      <input type="text" class="form-control input-lg" id="evolucion" name="evolucion" placeholder="Evolución">
                </div>  
                <div class="form-group col-md-6">
                    <div align="left">MC (Intervención Quirúrgica Electiva)</div>
                      <input type="text" class="form-control input-lg" id="evolucion" name="mc" placeholder="MC (Intervención Quirúrgica Electiva)">
                </div>  
                <div class="form-group col-md-12">     
                    <label><strong>HEA</strong></label>
                    <textarea class="form-control" id="hea" name="hea" rows="5">
</textarea>
                </div> 
                 <div class="form-group col-md-3">
                    <div align="left">APP</div>
                      <input type="text" class="form-control input-lg" id="app" name="app" placeholder="APP">
                </div>  
                <div class="form-group col-md-3">
                    <div align="left">APF</div>
                      <input type="text" class="form-control input-lg" id="apf" name="apf" placeholder="APF">
                </div>  
                 <div class="form-group col-md-6">
                    <div align="left">AGO</div>
                      <input type="text" class="form-control input-lg" id="ago" name="ago" placeholder="AGO">
                </div>
                <div class="form-group col-md-12">     
                    <label><strong>Examen Fisico</strong></label>
                    <textarea class="form-control" id="exa_fisi" name="exa_fisi" rows="3">TA:
FC:
FR:
TEMP:
</textarea>
                </div>
                <div class="form-group col-md-12">     
                    <label><strong>Textarea</strong></label>
                    <textarea class="form-control" id="condiciones" name="condiciones" rows="3">
</textarea>
                </div>
                <div class="form-group col-md-12">     
                    <label><strong>IDX</strong></label>
                    <textarea class="form-control" id="idx" name="idx" rows="2">1:
2:
</textarea>
                </div>  
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
        </div>


 
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

