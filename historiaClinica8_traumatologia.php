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

 <form action="guardarHistoriaClinica.php" method="POST" name="formularioActualizarcliente">




































<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 




        <div class="controls">
            <h2>ANAMNESIS</h2>
            <h4 class="h4-form">FUNCIONES BIOLÓGICAS
      <div class="popup" onclick="myFunction()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup">Campos obligatorios.</span>
            </div>
      </h4>     
            <textarea class="form-control" placeholder="Apetito"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Sed"></textarea> 
            <hr>   
            <textarea class="form-control" placeholder="Sudor"></textarea> 
            <hr>   
            <textarea class="form-control" placeholder="Sueño"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Orina"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Deposiciones"></textarea>   
  
      
      <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">HABITOS NOCIVOS
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Te"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Café"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Alcohol"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Tabaco"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Drogas"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ANTECEDENTES PERSONALES
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <small>Antecedentes Fisiológicos:</small>
      <hr>   
            <textarea class="form-control" placeholder="Nacido de parto:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Desarrollo Psicomotriz:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Inmunizaciones"></textarea>
            <small>Antecedentes Patológicos:</small>
      <hr>   
            <textarea class="form-control" placeholder="Alergias:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Traumatismos:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Enfermedades:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Hospitalizaciones:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Cirugías:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Transfusiones:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ANTECEDENTES FAMILIARES
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Padre"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Madre"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Hermanos"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Cónyugue"></textarea>
            <hr>  
            <textarea class="form-control" placeholder="Hijos"></textarea> 

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ANTECEDENTES SOCIOECONÓMICOS
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Vivienda"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Servicios"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Alimentación"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ANTECEDENTES EPIDEMIOLÓGICOS.
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="CONTACTO CON TOSEDORES:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="VIAJE A ZONAS ENDEMICAS:"></textarea>
            

            <h2>EXAMEN FÍSICO GENERAL</h2>
            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">CONTROL DE SIGNOS VITALES
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
      <select class="form-control">
        <option selected>PRESION ARTERIAL:</option>
        <option>130/80mmHg</option>
      </select><hr>
      <select class="form-control">
        <option selected>FR:</option>
        <option>18resp.xmin</option>
      </select><hr>
      <select class="form-control">
        <option selected>FC:</option>
        <option>96 lpm</option>
      </select><hr>
      <select class="form-control">
        <option selected>TEMPERATURA:</option>
        <option>36,5C°</option>
      </select><hr>
      <select class="form-control">
        <option selected>PULSO:</option>
        <option>92xmin</option>
      </select><hr>
      <select class="form-control">
        <option selected>PESO:</option>
        <option>82kg.</option>
      </select>
      <hr>
      <select class="form-control">
        <option selected>TALLA:</option>
        <option>1.73cm</option>
      </select>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ASPECTO GENERAL
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Paciente en regular estado general; regular estado de nutrición y regular estado de
hidratación. Se encuentra despierto, consciente, lúcido y orientado en tiempo,
espacio y persona, no colabora con el examen físico."></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">PIEL
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Piel"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Sistema Piloso"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Uñas"></textarea>


            <hr style="border:1px solid #423cbc;">
            <h2>EXAMEN POR APARATOS Y SISTEMAS</h2>
            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Cabeza
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
      <select class="form-control">
        <option selected>OJOS</option>
      </select><hr>
      <select class="form-control">
        <option selected>PUPILAS</option>
      </select><hr>
      <select class="form-control">
        <option selected>CONJUNTIVAS</option>
      </select><hr>
      <select class="form-control">
        <option selected>PÁRPADOS</option>
      </select><hr>
      <select class="form-control">
        <option selected>MUCOSAS</option>
      </select><hr>
      <select class="form-control">
        <option selected>LENGUA</option>
      </select>
      <select class="form-control">
        <option selected>DIENTES</option>
      </select>
      <select class="form-control">
        <option selected>OROFARINGE</option>
      </select>
      <select class="form-control">
        <option selected>OIDOS</option>
      </select>

      <hr style="border:1px solid #423cbc;">
      <h2>TORAX</h2>
      <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">APARATO RESPIRATORIO
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Auscultación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Palpación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Percusión:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">APARATO CARDIOVASCULAR
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Auscultación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Pulso:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">ABDOMEN
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Auscultación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Palpación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Percusión:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">GENIRO URINARIO
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección: Cara anterior del abdomen: Sin anomalías aparentes. Región lumbar: sin anomalías aparentes."></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Palpación: Palpación del Riñón: Maniobra de Guyon (-). Puntos reno Ureterales: Superior derecho (-) Superior izquierdo (-).
            Medio derecho (-) Medio izquierdo (-)"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Puño percusión Lumbar: No evaluado."></textarea>

            <hr style="border:1px solid #423cbc;">
      <h2>APARATO LOCOMOTOR</h2>
      <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Extremidades superiores:
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Palpación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Movimientos:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Extremidades Inferiores:
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Inspección:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Palpación:"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Movimientos:"></textarea>

            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Neurológico
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <hr>   
            <textarea class="form-control" placeholder="Apertura palpebral: 4"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Respuesta verbal: 5"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="Respuesta motora: 6"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="GLASGOW"></textarea>

            <hr style="border:1px solid #423cbc;">
            <h2>SISTEMA LINFÁTICO</h2>
            <hr style="border:1px solid #423cbc;">
      <h4 class="h4-form">Impresión Diagnóstica
      <div class="popup" onclick="myFunction4()"><b class="required-marlon">*</b>
            <span class="popuptext" id="myPopup4">Campos obligatorios.</span>
            </div>
      </h4>
      <small>Diagnósticos sindrómicos:</small>
      <hr>   
            <textarea class="form-control" placeholder="- Síndrome de impotencia funcional"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="- Síndrome edematoso"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="-Síndrome anémico"></textarea>
            <hr style="border:1px solid #423cbc;">   
            <small>Diagnóstico etiológico:</small> <b>-Fractura intertrocantérica de fémur izquierdo</b>
            <hr>   
            <textarea class="form-control" placeholder="-Anemia normocítica normocrómica"></textarea>
            <hr>   
            <textarea class="form-control" placeholder="- Hipocalcemia"></textarea>


 


<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 
<!--  *******************************  FISIOTERAPEÚTICA  **************************** --> 






































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


      function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };



 
function calcularimc()
{

 

  m1 = document.getElementById("peso").value;
  m2 = document.getElementById("altura").value;

  r = m1/((m2/100)*(m2/100));
 
 

  document.getElementById("imc").value = r.toFixed(2);
 

  if (r.toFixed(2) < 16) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez Severa';
  else if
    (r.toFixed(2) > 16 &  r.toFixed(2) < 16.99) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez moderada';
  else if 
    (r.toFixed(2) > 17 & r.toFixed(2) < 18.49) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
  else if 
    (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99) 
  
      ComposicionCorporal = 'Peso Normal';
  
  else if 
    (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99) 
  
      ComposicionCorporal = 'Sobrepeso';
  
  else if 
    (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99) 
  
      ComposicionCorporal = 'Obeso: Tipo I';
  
  else if 
    (r.toFixed(2) > 35.00 & r.toFixed(2) < 40) 
  
      ComposicionCorporal = 'Obeso: Tipo II';
  
  else if 
    (r.toFixed(2) > 40.00) 
  
      ComposicionCorporal = 'Obeso: Tipo III';
  
 


document.getElementById("ComposicionCorporal").value = ComposicionCorporal; 
}

 
</script>