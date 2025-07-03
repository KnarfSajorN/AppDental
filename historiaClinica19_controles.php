<?php 
   include 'header.php';
   include 'menu.php';
?>


<script type="text/javascript">
function mostrar(id) {
  if (id == "servicio1") {
    $("#servicio1").show();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }
  
  if (id == "servicio2") {
    $("#servicio1").hide();
    $("#servicio2").show();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }
  
  if (id == "servicio3") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").show();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }

  if (id == "servicio4") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").show();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }
   if (id == "servicio5") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").show();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }
  if (id == "servicio6") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").show();
    $("#servicio7").hide();
    $("#servicio8").hide();
    
  }
  if (id == "servicio7") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").show();
    $("#servicio8").hide();
    
  }
  if (id == "servicio8") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    $("#servicio5").hide();
    $("#servicio6").hide();
    $("#servicio7").hide();
    $("#servicio8").show();
    
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
          <option value="servicio1">Signos vitales</option>
          <option value="servicio2">Notas de enfermeria</option>
          <option value="servicio3">Hoja de control de líquidos.</option>
          <option value="servicio4">Administración de medicamentos</option>
          <option value="servicio5">Hoja de evolución</option>
          <option value="servicio6">Referencia</option>
          <option value="servicio7">Contrareferencia</option>

          </select>

          </form>
</div>


<div id="servicio1" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Signos vitales </h2></div>


        <form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento Corporal    ********************************************
     ******************************************************************************************************************************** -->

       
        <input  type="hidden" name="tratamiento"  value="1">
        


      

      <div class="form-group col-md-5" align="right">
        <font size="4"> Hora</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="time" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> TA:</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Tº </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to4" name="to4"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> P  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to5" name="to5"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> FR  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to6" name="to6"  step="any"> 
      </div>

      


      <div class="form-group col-md-5" align="right">
        <font size="4"> Tempeatura </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to7" name="to7"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4">PA   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to8" name="to8"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4">Peso </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to9" name="to9"  step="any"> 
      </div>


      <div class="form-group col-md-5" align="right">
        <font size="4"> Orina Total  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Evacuaciones:   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>



      <div class="form-group col-md-5" align="right">
        <font size="4"> Vomitos:   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
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

  <div  class="form-group col-md-12" align="center"><h2>Notas de enfermeria </h2></div>



   <form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
   
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

   <div class="form-group col-md-2">
                <div align="left">Hora de la Nota </div>
              </div>

            <div class="form-group col-md-4">
        <input type="text" class="form-control input-lg" id="hora" name="hora"  step="any"> 
      </div>    

              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>

    <div class="form-group col-md-12">
                <div align="left">Nombre de la Enfermera  </div>
</div>
                  <div class="form-group col-md-12">
        <input type="text" class="form-control input-lg" id="enfermera" name="enfermera"  step="any"> 
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

<div align="center"><h2>Hoja de control de líquidos. </h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->
 
        <input  type="hidden" name="tratamiento"  value="3">
        





        <div class="form-group col-md-5" align="right">
        <font size="4"> Tipo </font>    
      </div>
      <div class="form-group col-md-7">

                <select   name="tratamiento" class="form-control select2"  style="width: 100%;">
                  <option> Ingreso </option>
                  <option> Egreso </option>
                  
                  
        </select>
       </div>



        <div class="form-group col-md-5" align="right">
        <font size="4"> Hora </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="hora" name="hora"  step="any"> 
      </div>

              
             <!--  <select   name="tratamiento" class="form-control select2"  style="width: 100%;">
                  <option> 8   </option>
                  <option> 9 </option>
                  <option> 10 </option>
                  <option> 11 </option>
                  <option> 12 </option>
                  <option> 13 </option>
                  <option> 14 </option>
                  <option> 15 </option>
                  <option> 16 </option>
                  <option> 17 </option>
                  <option> 18 </option>
                  <option> 19 </option>
                  <option> 20 </option>
                  <option> 21 </option>
                  <option> 22 </option>
                  <option> 23 </option>
                  <option> 24 </option>
                  <option> 1 </option>
                  <option> 2 </option>
                  <option> 3 </option>
                  <option> 4 </option>
                  <option> 5 </option>
                  <option> 6 </option>
                  <option> 7 </option>
                  <option> 8 </option>
                  
                  
        </select>-->
      


 
   

      <div class="form-group col-md-5" align="right">
        <font size="4"> Oral </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Solución IV</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Sangre </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to4" name="to4"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4">Plasma </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to5" name="to5"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Sonda  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to6" name="to6"  step="any"> 
      </div>

      


      <div class="form-group col-md-5" align="right">
        <font size="4"> Otros </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to7" name="to7"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Orina   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to8" name="to8"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Evacuación  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to9" name="to9"  step="any"> 
      </div>


      <div class="form-group col-md-5" align="right">
        <font size="4"> Vomito  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4">  Hemorragia </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>



      <div class="form-group col-md-5" align="right">
        <font size="4"> Succión:   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>




      <div class="form-group col-md-5" align="right">
        <font size="4"> Canalización:   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
      </div>



      <div class="form-group col-md-5" align="right">
        <font size="4"> Resp. y sudor:   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="text" class="form-control input-lg" id="to10" name="to10"  step="any"> 
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



       </div>
 



<div id="servicio4" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Administración de medicamentos</h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->
 
 


      <div class="form-group col-md-5" align="right">
        <font size="4"> Fecha </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="date" value="<?php echo date("d-m-Y")?>" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Hora</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Medicamento  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to4" name="to4"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4">Dosis </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to5" name="to5"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Frecuencia   </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to6" name="to6"  step="any"> 
      </div>

      


      <div class="form-group col-md-5" align="right">
        <font size="4"> Vía  </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to7" name="to7"  step="any"> 
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













<div id="servicio5" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Hoja de evolución</h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->
 
 


      <div class="form-group col-md-5" align="right">
        <font size="4"> Fecha </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="date" value="<?php echo date("d-m-Y")?>" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Hora</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      
 







              <div class="form-group col-md-12">
                <div align="left">Notas  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
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























<div id="servicio6" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Referencia </h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->
 
 


      <div class="form-group col-md-5" align="right">
        <font size="4"> Fecha </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="date" value="<?php echo date("d-m-Y")?>" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Hora</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      
 







              <div class="form-group col-md-12">
                <div align="left">Padecimientoctual  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>


 


              <div class="form-group col-md-12">
                <div align="left">Evolución  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>


 


              <div class="form-group col-md-12">
                <div align="left">EstudiosParaclinicos  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>







              <div class="form-group col-md-12">
                <div align="left"> Diagnóstico Inicial:  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
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

























<div id="servicio7" class="element" style="display: none;">
<div class="col-md-12">

<div align="center"><h2>Contrareferenia </h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica19_controles.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->
 
 


      <div class="form-group col-md-5" align="right">
        <font size="4"> Fecha </font>    
      </div>
      <div class="form-group col-md-7">
        <input type="date" value="<?php echo date("d-m-Y")?>" class="form-control input-lg" id="to2" name="to2"  step="any"> 
      </div>

      <div class="form-group col-md-5" align="right">
        <font size="4"> Hora</font>    
      </div>
      <div class="form-group col-md-7">
        <input type="number" class="form-control input-lg" id="to3" name="to3"  step="any"> 
      </div>

      
 







              <div class="form-group col-md-12">
                <div align="left">Padecimiento actual:   </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>


 


              <div class="form-group col-md-12">
                <div align="left">Evolución  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>


 


              <div class="form-group col-md-12">
                <div align="left">Estudios paraclinicos  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>







              <div class="form-group col-md-12">
                <div align="left"> Diagnóstico Inicial:  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left"> Diagnóstico final:  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>






              <div class="form-group col-md-12">
                <div align="left">Recomendación para su manejo:  </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
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