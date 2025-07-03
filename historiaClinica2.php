   <?php 
   include 'header.php';
   include 'menu.php';?>


<script type="text/javascript">
function mostrar(id) {
  if (id == "servicio1") {
    $("#servicio1").show();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    
  }
  
  if (id == "servicio2") {
    $("#servicio1").hide();
    $("#servicio2").show();
    $("#servicio3").hide();
    $("#servicio4").hide();
 
  }
  
  if (id == "servicio3") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").show();
    $("#servicio4").hide();
   
  }

  if (id == "servicio4") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").show();
   
  }
  
 
}
</script>

 
<?php
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 

 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
                    $nombre_cliente=$rowMotorizado['nombre_cliente'];
                    $celular =$rowMotorizado['celular_cliente'];
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


      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Procedimiento
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Procedimiento</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
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
                <label><?php echo calculaedad($fechaNacimiento);?></label>
                
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


                /*

                   <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />

                */
                ?>


             
 
              </div>  
<br>
 
  <div class="col-md-12">
  <hr>        
          <div class="col-md-6">  
          <h4 class="card-title">Agregar tratamiento</h4>                                 
          </div>
          
          <div class="col-md-6" align="right">  
          <h4 class="card-title"> <?php echo date("d-m-Y h:m")?> </h4>                                 
          </div>
          

          <br>




          <form action="index.php" method="post">
          <label>Selección tipo de tratamiento </label>
          <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 40%;">
          <option >Seleccione </option>
          <option value="servicio1">Corporal</option>
          <option value="servicio2">Facial</option>
          <option value="servicio3">Láser</option>
          <option value="servicio4">Otro</option>

          </select>
          </form>
</div>


<div id="servicio1" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Tratamiento Corporal </h2></div>


        <form class="form-horizontal" action="guardarHistoriaClinica2.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento Corporal    ********************************************
     ******************************************************************************************************************************** -->

        <div> Tratamiento </div>
        <input  type="hidden" name="tratamiento"  value="1">
        


      <div class="form-group col-md-5" align="right">
        <font size="4"> Medidas</font>    
      </div>
      <div class="form-group col-md-7">
        <select   name="to1" class="form-control select2"  style="width: 100%;">
                  <option >Seleccione </option>
                  <option value="Medidas Iniciales">Iniciales</option>
                  <option value="Medidas A Mitad ">A Mitad </option>
                  <option value="Medidas Finales">Finales</option>
        </select>
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Busto</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Abdomen Alto</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Cintura </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to4" name="to4"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Cadera  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to5" name="to5"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Pierna Derecha   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to6" name="to6"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Pierna Izquierda   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to7" name="to7"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Brazo Derecho   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to8" name="to8"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Brazo Izquierdo  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to9" name="to9"  step="any"> 
      </div>


      <div class="form-group col-md-5" align="right">
        <font size="4"> Peso  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Record de sesiones FACIAL :   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>






 
 

<div class="form-group col-md-12" >
     <hr style="border-color:blue;">
      </div>




 
        <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso1" name="peso" onChange="calcularimc1();" step="any">
              </div>

              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centímetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura1" name="altura" onChange="calcularimc1();" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc1" name="imc" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal1" name="ComposicionCorporal">
              </div>

        <div class="form-group col-md-12">
          <div align="left">Procedimiento </div>
        </div>

        
        <div class="box-body pad">
        
          <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>
        


              <div class="form-group col-md-12">
                <div align="left">Plan de atención </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Información de facturación </strong>  </label>
                  </div>
              

<div class="col-sm-6">
  Monto de abono o pago
</div>

<div class="col-sm-6">
   <input type="text" name="abono"  class="form-control input-lg" id="abono" min="1">
</div>



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
                    <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
              
            

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
             
            
          </form>

</div>
 </div>



<div id="servicio2" class="element" style="display: none;">

  <div  class="form-group col-md-12" align="center"><h2>Tratamiento Facial </h2></div>



   <form class="form-horizontal" action="guardarHistoriaClinica2.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento Corporal    ********************************************
     ******************************************************************************************************************************** -->

      
      <input  type="hidden" name="tratamiento"  value="2">
        
    
      <div  class="form-group col-md-12"> <strong> Motivo de la consulta  </strong> </div>  

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to1" name="to1">
        Delineado parpado superior</font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to2" name="to2"> 
        <font size="4">Delineado parpado inferior</font>
      </div>
 
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to3" name="to3">
        <font size="4">Cejas </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to4" name="to4">
        <font size="4">Delineado de labios  </font> 
      </div>




      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to5" name="to5">
        Relleno de labios </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to6" name="to6"> 
        <font size="4">Camuflaje de cicatriz</font>
      </div>
 
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to7" name="to7">
        <font size="4">Retoque </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to8" name="to8">
        <font size="4">Corrección </font> 
      </div>






   <div align="center" class="form-group col-md-12"><strong>  ANALISIS FACIAL </strong></div>  
   <div class="form-group col-md-12"><strong> Forma de la cara</strong></div>  

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to9" name="to9">
       Larga </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to10" name="to10"> 
        <font size="4">Redonda </font>
      </div>
 
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to11" name="to11">
        <font size="4">Cuadrada </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to12" name="to12">
        <font size="4">Ovalada </font> 
      </div>
 

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to13" name="to13">
        Diamante </font> 
      </div>

  <div  class="form-group col-md-12"><strong>Forma de los Ojos</strong> </div>  


      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to14" name="to14"> 
        <font size="4"> Rasgados </font>
      </div>
 
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to15" name="to15">
        <font size="4">Grandes </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to16" name="to16">
        <font size="4">Redondos </font> 
      </div>

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to17" name="to17">
        <font size="4">Normales
        </font> 
      </div>


<div  class="form-group col-md-12"><strong>Forma de Labios </strong> </div>  

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to18" name="to18">
        <font size="4">Ovales </font> 
      </div>

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to19" name="to19">
        <font size="4">Caidos </font> 
      </div>

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to20" name="to20">
        <font size="4">Gruesos </font> 
      </div>

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to21" name="to21">
        <font size="4">Pequeños </font> 
      </div>

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to22" name="to22">
        <font size="4">Puntiagudos </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to23" name="to23">
        <font size="4">Normales </font> 
      </div>


<div  class="form-group col-md-12"><strong>ANTECEDENTES  </strong> </div>  

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to24" name="to24">
        <font size="4">Cicatriz Queloide  </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to25" name="to25">
        <font size="4">Diabetes  </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to26" name="to26">
        <font size="4">Hepilepsia </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to27" name="to27">
        <font size="4">Herpes </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to28" name="to28">
        <font size="4">Cancer </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to29" name="to29">
        <font size="4">Enfermedades Cardiacas  </font> 
      </div>

      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to30" name="to30">
        <font size="4">Alergias  </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to31" name="to31">
        <font size="4">Usa Esteroides  </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to32" name="to32">
        <font size="4">Anticuagulantes </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to33" name="to33">
        <font size="4">Embarazo</font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to34" name="to34">
        <font size="4">Usa Lentes </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to35" name="to35">
        <font size="4">Usa Acutane </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to36" name="to36">
        <font size="4">Usa Retina  </font> 
      </div>
      <div class="form-group col-md-4" >
        <input type="checkbox" class="minimal" id="to37" name="to37">
        <font size="4">Enfermedades Atoinmune  </font> 
      </div>


<div  class="form-group col-md-12">
 
Esta en algún Tratamiento 
<input type="checkbox" class="minimal" id="to38" name="to38">
 <br>
 Cuales
<input type="text" class="form-control input-lg" name="to39">
  
</div>  

<div  class="form-group col-md-12">
 <strong>   EXAMEN FISICO </strong>     
</div> 

      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to40" name="to40">
        <font size="4">T/A  </font> 
      </div>
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to41" name="to41">
        <font size="4">F/C  </font> 
      </div>
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to42" name="to42">
        <font size="4">F/R  </font> 
      </div>
      <div class="form-group col-md-3" >
        <input type="checkbox" class="minimal" id="to43" name="to43">
        <font size="4">T  </font> 
      </div>



 
 <div class="form-group col-md-12" >
     <hr style="border-color:blue;">
      </div>


<!--

        <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso2" name="peso" onChange="calcularimc2();" step="any">
              </div>

              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centímetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura2" name="altura" onChange="calcularimc2();" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc2" name="imc" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal2" name="ComposicionCorporal">
              </div>
-->
        <div class="form-group col-md-12">
          <div align="left">Procedimiento </div>
        </div>

        
        <div class="box-body pad">
        
          <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>
        


              <div class="form-group col-md-12">
                <div align="left">Plan de atención </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Información de facturación </strong>  </label>
                  </div>
              

<div class="col-sm-6">
  Monto de abono o pago
</div>

<div class="col-sm-6">
   <input type="text" name="abono"  class="form-control input-lg" id="abono" min="1">
</div>



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
                    <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
              
            

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
             
            
          </form>

 <br>
 <div class="col-md-12">
     <hr style="border-color:blue;"> <br>
     Consentimiento Informado 
      </div>

<form method="GET" action="imprimirConsentimiento1.php"  target="_blank">
<div class="col-sm-6">
MICROPIGMENTACION de
<input  type="text" name="micropigmentacion" class="form-control input-lg"  >


        



<input  type="hidden" name="usuario_id"  value="<?php echo $_SESSION['ID']?>">
<input  type="hidden" name="cliente_id"  value="<?php echo $clienteId?>">
</div>
<div class="col-sm-6">
 <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  Imprimir </strong> </h2> </button></center>
</div>
</form>


 
 </div>



<div id="servicio3" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Tratamiento láser </h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica2.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->

        <div> Tratamiento láser</div>
        <input  type="hidden" name="tratamiento"  value="3">
        


      <div class="form-group col-md-12">
        <font size="4"> <strong> TRATAMIENTO A SEGUIR </strong> </font>    
      </div>
 

<div class="form-group col-md-12">
Depilación 
 </div>

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to1" name="to1">
        Completa </font> 
      </div>
      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to2" name="to2">
        Bikini</font> 
      </div>

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to3" name="to3">
        Axilas </font> 
      </div>

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to4" name="to4">
        P/C </font> 
      </div>

       <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to5" name="to5">
        M/P </font> 
      </div>
<div class="form-group col-md-12">
<hr> 
 </div>
 

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to6" name="to6">
        Rejuvenecimiento de la piel      </font> 
      </div>

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to7" name="to7">
        Pigmentación</font> 
      </div>


      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to8" name="to8">
       Terapia de Acne </font> 
      </div>

      <div class="form-group col-md-3" >
        <font size="4"><input type="checkbox" class="minimal" id="to9" name="to9">
        Terapia Vacular</font> 
      </div>




<div class="form-group col-md-3">
  Tipo de Piel 
        <select   name="to10" class="form-control select2"  style="width: 100%;">
                  <option >Seleccione </option>
                  <option value="Tipo 1">Tipo 1</option>
                  <option value="Tipo 2">Tipo 2</option>
                  <option value="Tipo 3">Tipo 3</option>
                  <option value="Tipo 4">Tipo 4</option>
                  <option value="Tipo 5">Tipo 5</option>
                   
        </select>
      </div>
  



<div class="form-group col-md-3">
 Tipo de Vello 
        <select   name="to11" class="form-control select2"  style="width: 100%;">
                  <option >Seleccione </option>
                  <option value="Grueso">Grueso </option>
                  <option value="Delgado">Delgado </option>
                  <option value="Mediano">Mediano  </option>
                  
        </select>
      </div>



<div class="form-group col-md-3">
 Densidad 
        <select   name="to12" class="form-control select2"  style="width: 100%;">
          <option >Seleccione </option>
          <option value="Alta">Alta </option>
          <option value="Medio">Medio </option>
        </select>
      </div>

<div class="form-group col-md-3">
 Color 
         <input type="text" name="to13" class="form-control input-lg">
      </div>



    <div class="form-group col-md-12" >
        <font size="4"> <strong>  INFORMACIÓN PERSONAL </strong> </font>    
      </div>
 

      <div class="form-group col-md-4" >
        <font size="4"> Esta Tomando antibióticos </font>
          <input value="1" type="radio" name="to14" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to14" id="lt" class="flat-red"/> NO  
      </div>


      <div class="form-group col-md-4" >
        <font size="4">Toma vitaminas A-B </font>
          <input value="1" type="radio" name="to15" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to15" id="lt" class="flat-red"/> NO  
      </div>


      <div class="form-group col-md-4" >
        <font size="4">Toma Robacutam </font>
          <input value="1" type="radio" name="to16" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to16" id="lt" class="flat-red"/> NO  
      </div>






      <div class="form-group col-md-4" >
        <font size="4">Toma Aminoglucosos </font>
          <input value="1" type="radio" name="to17" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to17" id="lt" class="flat-red"/> NO  
      </div>


      <div class="form-group col-md-4" >
        <font size="4">Fuma  </font>
          <input value="1" type="radio" name="to18" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to18" id="lt" class="flat-red"/> NO  
      </div>


      <div class="form-group col-md-4" >
        <font size="4">Tiene piel bronceada </font>
          <input value="1" type="radio" name="to19" id="lt" class="flat-red"/> SI  
          <input value="2" type="radio" name="to19" id="lt" class="flat-red"/> NO  
      </div>




      <div class="form-group col-md-12" >
        <font size="4"> <strong> Clase de Depilación  </strong> </font>    
      </div>
 
      <div class="form-group col-md-4" >
        <font size="4"><input type="checkbox" class="minimal" id="to20" name="to20">
       Cera  </font> 
      </div>
       <div class="form-group col-md-4" >
        <font size="4"><input type="checkbox" class="minimal" id="to21" name="to21">
        Cuchilla </font> 
      </div>
       <div class="form-group col-md-4" >
        <font size="4"><input type="checkbox" class="minimal" id="to22" name="to22">
      Cremas     </font> 
      </div>



 <div class="form-group col-md-12" >
     <hr style="border-color:blue;">
      </div>


 <!--
 
        <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso3" name="peso" onChange="calcularimc3();" step="any">
              </div>

              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centímetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura3" name="altura" onChange="calcularimc3();" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc3" name="imc" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal3" name="ComposicionCorporal">
              </div>
-->
        <div class="form-group col-md-12">
          <div align="left">Procedimiento </div>
        </div>

        
        <div class="box-body pad">
        
          <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>
        


              <div class="form-group col-md-12">
                <div align="left">Plan de atención </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Información de facturación </strong>  </label>
                  </div>
              

<div class="col-sm-6">
  Monto de abono o pago
</div>

<div class="col-sm-6">
   <input type="text" name="abono"  class="form-control input-lg" id="abono" min="1">
</div>



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
                    <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
              
            

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
            </div>
            
             
</form>





 <br>
 <div class="col-md-12">
     <hr style="border-color:blue;"> <br>
     Consentimiento Informado 
      </div>

<form method="GET" action="imprimirConsentimiento2.php"  target="_blank">
<div class="col-sm-6">

<!-- 
MICROPIGMENTACION de
<input  type="text" name="micropigmentacion" class="form-control input-lg"  >
-->
    
<input  type="hidden" name="usuario_id"  value="<?php echo $_SESSION['ID']?>">
<input  type="hidden" name="cliente_id"  value="<?php echo $clienteId?>">
</div>
<div class="col-sm-6">
 <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  Imprimir </strong> </h2> </button></center>
</div>
</form>

</div>




<div id="servicio4" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Tratamiento</h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica2.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->

        <div> Tratamiento </div>
        <input  type="hidden" name="tratamiento"  value="3">
        
      <div class="form-group col-md-5" align="right">
        <font size="4"> Tipo de tratamiento </font>    
      </div>
      <div class="form-group col-md-7">

        <?php $idUsuario = $_SESSION['ID'];
 
        ?>


        <select   name="tratamiento" class="form-control select2"  style="width: 100%;">
                  <option >Seleccione </option>
                 <?php echo e_serviciosselect($idUsuario) ?>
        </select>
      </div>
 



 

        <div class="form-group col-md-12">
        <textarea id="descripcion" name="descripcion" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
        </div>

 
        <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso4" name="peso" onChange="calcularimc4();" step="any">
              </div>

              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centímetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura4" name="altura" onChange="calcularimc4();" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc4" name="imc" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal4" name="ComposicionCorporal">
              </div>

        <div class="form-group col-md-12">
          <div align="left">Procedimiento </div>
        </div>

        
        <div class="box-body pad">
        
          <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>
        


              <div class="form-group col-md-12">
                <div align="left">Plan de atención </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Información de facturación </strong>  </label>
                  </div>
              

<div class="col-sm-6">
  Monto de abono o pago
</div>

<div class="col-sm-6">
   <input type="text" name="abono"  class="form-control input-lg" id="abono" min="1">
</div>



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
                    <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
              
            

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
             
            
          </form>

</div>
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



 
function calcularimc1()
{
  m1 = document.getElementById("peso1").value;
  m2 = document.getElementById("altura1").value;

  r1 = m1/((m2/100)*(m2/100));

  document.getElementById("imc1").value = r1.toFixed(2);

  if (r1.toFixed(2) < 16) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez Severa';
  else if
    (r1.toFixed(2) > 16 &  r1.toFixed(2) < 16.99) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez moderada';
  else if 
    (r1.toFixed(2) > 17 & r1.toFixed(2) < 18.49) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r1.toFixed(2) > 18.50 & r1.toFixed(2) < 24.99) 
      ComposicionCorporal1 = 'Peso Normal';
  
  else if 
    (r1.toFixed(2) > 25.00 & r1.toFixed(2) < 29.99) 
      ComposicionCorporal1 = 'Sobrepeso';
  
  else if 
    (r1.toFixed(2) > 30.00 & r1.toFixed(2) < 34.99) 
      ComposicionCorporal1 = 'Obeso: Tipo I';
  
  else if 
    (r1.toFixed(2) > 35.00 & r1.toFixed(2) < 40) 
      ComposicionCorporal1 = 'Obeso: Tipo II';
  
  else if 
    (r1.toFixed(2) > 40.00) 
      ComposicionCorporal1 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal1").value = ComposicionCorporal1; 

}

function calcularimc2()
{
  m1 = document.getElementById("peso2").value;
  m2 = document.getElementById("altura2").value;

  r2 = m1/((m2/100)*(m2/100));

  document.getElementById("imc2").value = r2.toFixed(2);

  if (r2.toFixed(2) < 16) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez Severa';
  else if
    (r2.toFixed(2) > 16 &  r2.toFixed(2) < 16.99) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez moderada';
  else if 
    (r2.toFixed(2) > 17 & r2.toFixed(2) < 18.49) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r2.toFixed(2) > 18.50 & r2.toFixed(2) < 24.99) 
      ComposicionCorporal2 = 'Peso Normal';
  
  else if 
    (r2.toFixed(2) > 25.00 & r2.toFixed(2) < 29.99) 
      ComposicionCorporal2 = 'Sobrepeso';
  
  else if 
    (r2.toFixed(2) > 30.00 & r2.toFixed(2) < 34.99) 
      ComposicionCorporal2 = 'Obeso: Tipo I';
  
  else if 
    (r2.toFixed(2) > 35.00 & r2.toFixed(2) < 40) 
      ComposicionCorporal2 = 'Obeso: Tipo II';
  
  else if 
    (r2.toFixed(2) > 40.00) 
      ComposicionCorporal2 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal2").value = ComposicionCorporal2; 

}

 
function calcularimc3()
{
  m1 = document.getElementById("peso3").value;
  m2 = document.getElementById("altura3").value;

  r3 = m1/((m2/100)*(m2/100));

  document.getElementById("imc3").value = r3.toFixed(2);

  if (r3.toFixed(2) < 16) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez Severa';
  else if
    (r3.toFixed(2) > 16 &  r3.toFixed(2) < 16.99) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez moderada';
  else if 
    (r3.toFixed(2) > 17 & r3.toFixed(2) < 18.49) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r3.toFixed(2) > 18.50 & r3.toFixed(2) < 24.99) 
      ComposicionCorporal3 = 'Peso Normal';
  
  else if 
    (r3.toFixed(2) > 25.00 & r3.toFixed(2) < 29.99) 
      ComposicionCorporal3 = 'Sobrepeso';
  
  else if 
    (r3.toFixed(2) > 30.00 & r3.toFixed(2) < 34.99) 
      ComposicionCorporal3 = 'Obeso: Tipo I';
  
  else if 
    (r3.toFixed(2) > 35.00 & r3.toFixed(2) < 40) 
      ComposicionCorporal3 = 'Obeso: Tipo II';
  
  else if 
    (r3.toFixed(2) > 40.00) 
      ComposicionCorporal3 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal3").value = ComposicionCorporal3; 

}

 
function calcularimc4()
{
  m1 = document.getElementById("peso4").value;
  m2 = document.getElementById("altura4").value;

  r4 = m1/((m2/100)*(m2/100));

  document.getElementById("imc4").value = r4.toFixed(2);

  if (r4.toFixed(2) < 16) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez Severa';
  else if
    (r4.toFixed(2) > 16 &  r4.toFixed(2) < 16.99) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez moderada';
  else if 
    (r4.toFixed(2) > 17 & r4.toFixed(2) < 18.49) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r4.toFixed(2) > 18.50 & r4.toFixed(2) < 24.99) 
      ComposicionCorporal4 = 'Peso Normal';
  
  else if 
    (r4.toFixed(2) > 25.00 & r4.toFixed(2) < 29.99) 
      ComposicionCorporal4 = 'Sobrepeso';
  
  else if 
    (r4.toFixed(2) > 30.00 & r4.toFixed(2) < 34.99) 
      ComposicionCorporal4 = 'Obeso: Tipo I';
  
  else if 
    (r4.toFixed(2) > 35.00 & r4.toFixed(2) < 40) 
      ComposicionCorporal4 = 'Obeso: Tipo II';
  
  else if 
    (r4.toFixed(2) > 40.00) 
      ComposicionCorporal4 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal4").value = ComposicionCorporal4; 

}

 
</script>