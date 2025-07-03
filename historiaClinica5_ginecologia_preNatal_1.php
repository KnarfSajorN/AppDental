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


 <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
 
                      Gestación Anterior

                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour" class="panel-collapse collapse">
                    <div class="box-body">


                      <div class="form-group col-md-3">
                        <div align="left">Fecha</div>
                          <input type="date" class="form-control input-lg" id="pn01" name="pn01" placeholder="fecha">

                      </div>


                   <div class="form-group col-md-2">
                        <div align="left">Lactancia Materna </div>
<select name="pn02"  class="form-control select2" style="width: 100%;">

      <option>No hubo</option>

      <option>menor de 6 meses</option>

      <option>6 meses o mas </option>

      <option>No aplica </option>

    </select>
  </div>


       <div class="form-group col-md-2">
                        <div align="left">Terminacion</div>    
<input name="pn03" type="checkbox" />Parto Vaginal 

<br />

<input name="cbilibros" type="checkbox" checked="checked" /> Cesarea
<br />

<input name="cbiinternet" type="checkbox" />Aborto
<br />

<input name="cbiinternet" type="checkbox" />Eptopico
<br />

<input name="cbiinternet" type="checkbox" />Aborto Molar
<br />

<input name="cbiinternet" type="checkbox" />No aplica
 </div>


 <div class="form-group col-md-4">
                        <div align="left">Tipo de Aborto (si lo fue) </div>    
<input name="pn04" type="checkbox" />Incompleto

<br />

<input name="cbilibros" type="checkbox" checked="checked" /> Completo
<br />

<input name="cbiinternet" type="checkbox" />Frustro/Retenido
<br />

<input name="cbiinternet" type="checkbox" />Septico
<br />

<input name="cbiinternet" type="checkbox" />No aplica 

 </div>
 
                       </div>
                </div>
              </div>



<div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour1">
 
                     Antitetánica
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour1" class="panel-collapse collapse">
                    <div class="box-body">


       <div class="form-group col-md-3">
                        <div align="left">Numero de dosis Previa </div>
                          <input type="text" class="form-control input-lg" id="pn05" name="pn05" placeholder="No Dosis">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Primera dosis </div>
                          <input type="text" class="form-control input-lg" id="pn06" name="pn06" placeholder="1 Dosis">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Segunda dosis </div>
                          <input type="text" class="form-control input-lg" id="pn07" name="pn07" placeholder="2 Dosis">
                          
                      </div>
 
                       </div>
                </div>
              </div>

<div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour2">
 Vacunas Previas 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour2" class="panel-collapse collapse">
                    <div class="box-body">
<div class="form-group col-md-3">
<fieldset>
        <legend>Rubeola </legend>
        <label>
            <input type="radio" name="pn08" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn08" value="no"> No
        </label>
       
    </fieldset>      
                      </div>  <div class="form-group col-md-3">
<fieldset>
        <legend>Hepatitis B </legend>
        <label>
            <input type="radio" name="pn9" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn9" value="no"> No
        </label>
       
    </fieldset>      
                      </div> <div class="form-group col-md-3">
    <fieldset>
        <legend>Papiloma Virus  </legend>
        <label>
            <input type="radio" name="pn10" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn10" value="no"> No
        </label>
       
    </fieldset>      
                      </div><div class="form-group col-md-3">
 <fieldset>
        <legend>Fiebre Amarilla </legend>
        <label>
            <input type="radio" name="pn11" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn11" value="no"> No
        </label>
       
    </fieldset>      
                      </div>

 </div> </div>
                    



 
              <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour3">
Vicios 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour3" class="panel-collapse collapse">
                    <div class="box-body">

                      

                      <div class="form-group col-md-3">
                        <div align="left">Fuma (Numero de Cigarrillos por dia ) </div>
                          <input type="text" class="form-control input-lg" id="pn12" name="pn12" placeholder="fuma">  </div>
                          
         <div class="form-group col-md-3">             
 <fieldset>
        <legend>Drogas  </legend>
        <label>
            <input type="radio" name="pn13" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn13" value="no"> No
        </label>
       
    </fieldset> </div>

</div>
</div>

 </div> 
 
 
        
<div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour4">
 
                    Ultima menstruación 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour4" class="panel-collapse collapse">
                    <div class="box-body">


       <div class="form-group col-md-4">
                        <div align="left">FUM </div>
                          <input type="date" class="form-control input-lg" id="pn14" name="pn14" placeholder="FUM">
                      </div>

                        <div class="form-group col-md-3">             
                     <fieldset>
                      <legend>Duda </legend>
                      <label>
                 <input type="radio" name="pn15" value="si"> Si
               </label>
               <label>
            <input type="radio" name="pn15" value="no"> No
                </label>
                    </fieldset> </div>

                      <div class="form-group col-md-4">
                        <div align="left">EG. Ecografia </div>
                          <input type="text" class="form-control input-lg" id="pn16" name="pn16" placeholder="Eg">
                          </div>

                      <div class="form-group col-md-2">
                        <div align="left">Fecha Ecografia  </div>
                          <input type="date" class="form-control input-lg" id="pn17" name="pn017" placeholder="Fecha ECO">
                               </div> 

                      <div class="form-group col-md-2">
                        <div align="left">Fecha Probable Parto  </div>
                          <input type="date" class="form-control input-lg" id="pn18" name="pn018" placeholder=" Fecha parto">
                          
                      </div>
 
                       </div>
                </div>
              </div>            


 
              <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour5">
Volencia / Género  
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour5" class="panel-collapse collapse">
                    <div class="box-body">

                      
                         
         <div class="form-group col-md-3">             
 <fieldset>
        <legend>Ficha Tamizaje  </legend>
        <label>
            <input type="radio" name="pn19" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn19" value="no"> No
        </label>
       
    </fieldset> </div>


                 
         <div class="form-group col-md-3">             
 <fieldset>
        <legend>Violencia  </legend>
        <label>
            <input type="radio" name="pn20" value="si"> Si
        </label>
        <label>
            <input type="radio" name="pn20" value="no"> No
        </label>
       
    </fieldset> </div>

       <div class="form-group col-md-4">
                        <div align="left">Fecha  </div>
                          <input type="date" class="form-control input-lg" id="pn21" name="pn021" placeholder="Fecha ">
                               </div> 

</div>

</div>
</div>

             <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour6">
 
                   Examen Físico 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour6" class="panel-collapse collapse">
                    <div class="box-body">

                      <div class="form-group col-md-3">
                       <div align="left">Clinico </div>
<select name="pn22"  class="form-control select2" style="width: 100%;">

      <option>Sin Examen </option>

      <option>Normal</option>

      <option>Patológico o </option>
    </select>   </div>

<div class="form-group col-md-3">

                        <div align="left"> Mamas </div>
<select name="pn23"  class="form-control select2" style="width: 100%;">

      <option>Sin Examen </option>

      <option>Normal</option>

      <option>Patológico </option>
    </select>  </div>

<div class="form-group col-md-3">

                        <div align="left">Cuello Uterino </div>
<select name="pn24"  class="form-control select2" style="width: 100%;">

      <option>Sin Examen </option>

      <option>Normal</option>

      <option>Patológico </option>
    </select>  </div>

<div class="form-group col-md-3">
                        <div align="left"> Pelvis </div>
<select name="pn25"  class="form-control select2" style="width: 100%;">

      <option>Sin Examen </option>

      <option>Normal</option>

      <option>Patológico </option>
    </select>  </div>

       <div class="form-group col-md-3">
                        <div align="left">Odonto</div>
<select name="pn26"  class="form-control select2" style="width: 100%;">

      <option>Sin Examen </option>

      <option>Normal</option>

      <option>Patológico </option>
    </select>
</div>

</div>




 </div> 
   </div> 
                  <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour7">
 Exámenes  de Laboratorio 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour7" class="panel-collapse collapse">
                    <div class="box-body">

   <div class="form-group col-md-2">
  <div align="left">Glisemia 1 </div>
<select name="pn27"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>

      <option>Anormal</option>

      <option>No se hizo  </option>
    </select>  
     </div>  <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Glisemia1 </label>
                    </div> <input type="date" name="pn28"  class="form-control input-lg" id="pn28">

                    </div>

<div class="form-group col-md-2">

<div align="left"> Glisemia 2</div>
<select name="pn29"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>

      <option>Anormal</option>

      <option>No se hizo  </option>
    </select>   </div> 
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Glisemia2 </label>
                    </div> <input type="date" name="pn30"  class="form-control input-lg" id="pn31">

                    </div>


<div class="form-group col-md-2">

<div align="left">Tolerancia Glucosa </div>
<select name="pn32"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>

      <option>Anormal</option>

      <option>No se hizo  </option>
    </select>   </div>
     <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Glucosa</label>
                    </div> <input type="date" name="pn33"  class="form-control input-lg" id="pn33">

                    </div>


<div class="form-group col-md-2">
<div align="left">VDR/RPL 1</div>
<select name="pn34"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha VDR</label>
                    </div> <input type="date" name="pn35"  class="form-control input-lg" id="pn35">

                    </div>



    <div class="form-group col-md-2">
<div align="left">VDR/RPL 2</div>
<select name="pn36"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>

    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha VDR2</label>
                    </div> <input type="date" name="pn37"  class="form-control input-lg" id="pn37">
                    </div>



       <div class="form-group col-md-2">
<div align="left">FTA Abs</div>
<select name="pn38"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha FTA </label>
                    </div> <input type="date" name="pn39"  class="form-control input-lg" id="pn39">

                    </div>


  <div class="form-group col-md-2">
<div align="left">TPHA </div>
<select name="pn40"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha TPHA </label>
                    </div> <input type="date" name="pn41"  class="form-control input-lg" id="pn41">
                    </div>


<div class="form-group col-md-2">
<div align="left">Prueba Rap. Sifilis </div>
<select name="pn42"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Sifilis</label>
                    </div> <input type="date" name="pn43"  class="form-control input-lg" id="pn43">
                    </div>


    <div class="form-group col-md-2">
<div align="left">VHI Prueva Rap. 1</div>
<select name="pn44"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha VHI RAP1</label>
                    </div> <input type="date" name="pn45"  class="form-control input-lg" id="pn45">

                    </div>




<div class="form-group col-md-2">
<div align="left">VHI Prueva Rap. 2</div>
<select name="pn46"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha VHI RAP.2</label>
                    </div> <input type="date" name="pn47"  class="form-control input-lg" id="pn47">

                    </div>




    <div class="form-group col-md-2">
<div align="left">Elisa</div>
<select name="pn48"  class="form-control select2" style="width: 100%;">

      <option>No reactivo </option>

      <option>Reactivo</option>

      <option>No se hizo  </option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Elisa </label>
                    </div> <input type="date" name="pn49"  class="form-control input-lg" id="pn49">
                    </div>


 <div class="form-group col-md-2">
<div align="left">IFI Western Blot </div>
<select name="pn50"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>

      <option>Positivo</option>

      <option>No se hizo  </option>
       <option>No aplica</option>
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha IFI </label>
                    </div> <input type="date" name="pn51"  class="form-control input-lg" id="pn51">
                    </div>



<div class="form-group col-md-2">
<div align="left">HTVL I </div>
<select name="pn52"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha HTVL </label>
                    </div> <input type="date" name="pn53"  class="form-control input-lg" id="pn53">
                    </div>

<div class="form-group col-md-2">
<div align="left">THOCH </div>
<select name="pn53"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha THOCH </label>
                    </div> <input type="date" name="pn54"  class="form-control input-lg" id="pn54">
                    </div>



<div class="form-group col-md-2">
<div align="left">GOTA GRUESA</div>
<select name="pn55"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha GOTA G.</label>
                    </div> <input type="date" name="pn56"  class="form-control input-lg" id="pn56">
                    </div>

<div class="form-group col-md-2">
<div align="left">Malaria prueba Rap.</div>
<select name="pn57"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Malaria</label>
                    </div> <input type="date" name="pn58"  class="form-control input-lg" id="pn58">
                    </div>


<div class="form-group col-md-2">
<div align="left">Fluerec. Malaria </div>
<select name="pn59"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha fluerec. Malaria</label>
                    </div> <input type="date" name="pn60"  class="form-control input-lg" id="pn60">
                    </div>

<div class="form-group col-md-2">
<div align="left">Fluerec. Malaria </div>
<select name="pn61"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No Aplica </option>

    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha fluerec. Malaria</label>
                    </div> <input type="date" name="pn62"  class="form-control input-lg" id="pn62">
                    </div>

<div class="form-group col-md-2">
<div align="left">Ex. Comp. Orina  </div>
<select name="pn63"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Ex.Comp.Ori</label>
                    </div> <input type="date" name="pn64"  class="form-control input-lg" id="pn64">
                    </div>

<div class="form-group col-md-2">
<div align="left">Leucociturina </div>
<select name="pn65"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Leuco.</label>
                    </div> <input type="date" name="pn66"  class="form-control input-lg" id="pn66">
                    </div>

<div class="form-group col-md-2">
<div align="left">Nitritos  </div>
<select name="pn67"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Nitritos</label>
                    </div> <input type="date" name="pn68"  class="form-control input-lg" id="pn68">
                    </div>

<div class="form-group col-md-2">
<div align="left">Urocultivo  </div>
<select name="pn69"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No aplica </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Urocultivo</label>
                    </div> <input type="date" name="pn70"  class="form-control input-lg" id="pn70">
                    </div>

<div class="form-group col-md-2">
<div align="left">BK en esputo </div>
<select name="pn71"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No aplica </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha BK </label>
                    </div> <input type="date" name="pn72"  class="form-control input-lg" id="pn72">
                    </div>

<div class="form-group col-md-2">
<div align="left">Listeria Tamizaje </div>
<select name="pn73"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No aplica </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Listeria </label>
                    </div> <input type="date" name="pn74"  class="form-control input-lg" id="pn74">
                    </div>

 <div class="form-group col-md-2">
<div align="left">Hepatitis B </div>
<select name="pn75"  class="form-control select2" style="width: 100%;">

      <option>Negativo </option>
      <option>Positivo</option>
      <option>No se hizo  </option>
      <option>No aplica </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Hepatitis</label>
                    </div> <input type="date" name="pn76"  class="form-control input-lg" id="pn76">
                    </div>

<div class="form-group col-md-2">
<div align="left">IVAA </div>
<select name="pn77"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>
      <option>Anomal </option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha IVAA </label>
                    </div> <input type="date" name="pn78"  class="form-control input-lg" id="pn78">
                    </div>



<div class="form-group col-md-2">
<div align="left">PAP</div>
<select name="pn79"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>
      <option>Anomal </option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha PAP </label>
                    </div> <input type="date" name="pn80"  class="form-control input-lg" id="pn80">
                    </div>


<div class="form-group col-md-2">
<div align="left">Colposcopia </div>
<select name="pn81"  class="form-control select2" style="width: 100%;">

      <option>Normal </option>
      <option>Anomal </option>
      <option>No se hizo  </option>
      
    </select>  </div>
    <div class="form-group col-md-2">
                    <div align="left"> 
                    <label>Fecha Colposcopia</label>
                    </div> <input type="date" name="pn82"  class="form-control input-lg" id="pn82">
                  
  </div>  </div> </div> </div>

<div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour8">
 
                     Antecedentes Obstétricos 
                      </a>
                    </h4>
                  </div>
                  <div id="collapsefour8" class="panel-collapse collapse">
                    <div class="box-body">


                         <div class="form-group col-md-3">
                        <div align="left">Gestas </div>
                          <input type="text" class="form-control input-lg" id="pn83" name="pn83" placeholder="Gestas">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Abortos </div>
                          <input type="text" class="form-control input-lg" id="pn84" name="pn84" placeholder="Abortos">
                      </div>

                      <div class="form-group col-md-3">
                        <div align="left">Partos </div>
                          <input type="text" class="form-control input-lg" id="pn85" name="pn85" placeholder="Partos">
                      </div>


                         <div class="form-group col-md-3">
                        <div align="left">Vaginales </div>
                          <input type="text" class="form-control input-lg" id="pn86" name="pn86" placeholder="vaginales">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Cesareas </div>
                          <input type="text" class="form-control input-lg" id="pn87" name="pn87" placeholder="cesareas">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Nacidos vivos </div>
                          <input type="text" class="form-control input-lg" id="pn88" name="pn88" placeholder="nacidos vivos">
                          
                      </div>
<div class="form-group col-md-3">
                        <div align="left">Nacidos muertos</div>
                          <input type="text" class="form-control input-lg" id="pn89" name="pn89" placeholder="Nac. Muertos">
                      </div>


                         <div class="form-group col-md-3">
                        <div align="left">Vaiven</div>
                          <input type="text" class="form-control input-lg" id="pn90" name="pn90" placeholder="viven">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Muertos 1° semana </div>
                          <input type="text" class="form-control input-lg" id="pn91" name="pn91" placeholder="muertos 1° sem.">
                          
                      </div>
                      <div class="form-group col-md-3">
                        <div align="left">Muertos despues de las 1° Sem. </div>
                          <input type="text" class="form-control input-lg" id="pn92" name="pn92" placeholder="Muertos desp. 1° sem.">
                          
                      
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









<!-- ****************************************************************** Formulario PRENATAL  ******************************************************************* -->
<!-- ****************************************************************** Formulario PRENATAL  ******************************************************************* -->
 
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

