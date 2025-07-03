<?php include 'header.php';
include 'menu.php';
$cliente_id = $_GET['clienteId'];
$usuario_id = $_SESSION['ID'];

  $queryList=mysqli_query($conn3,"SELECT * FROM cliente WHERE usuario_id = $usuario_id and cliente_id = $cliente_id");
  $nrowl=mysqli_num_rows($queryList);
  while($row_recordset32=mysqli_fetch_array($queryList))
  {
     
        $usuario_id=$row_recordset32['usuario_id'];
        $nombre_cliente=$row_recordset32['nombre_cliente'];
        $celular_cliente=$row_recordset32['celular_cliente'];
        $ciudad_cliente=$row_recordset32['ciudad_cliente'];
        $correo_cliente=$row_recordset32['correo_cliente'];
        $CODI_CLIENTE=$row_recordset32['CODI_CLIENTE'];
        $id_uso_servicio=$row_recordset32['id_uso_servicio'];
        $tipo_cliente=$row_recordset32['tipo_cliente'];
        $fechar=$row_recordset32['fechar'];
        $fecha_actualizado=$row_recordset32['fecha_actualizado'];
        $activo=$row_recordset32['activo'];
        $genero=$row_recordset32['genero'];
        $direccion_cliente=$row_recordset32['direccion_cliente'];
        $telefono_cliente=$row_recordset32['telefono_cliente'];
        $edad_cliente=$row_recordset32['edad_cliente'];
        $profesion_cliente=$row_recordset32['profesion_cliente'];
        $acompananteFamiliar=$row_recordset32['acompananteFamiliar'];
        $telefono_acompanante=$row_recordset32['telefono_acompanante'];
        $antecedentes=$row_recordset32['antecedentes'];   
        $fotoperfil=$row_recordset32['fotoperfil']; 
        $tiposSangre=$row_recordset32['tiposSangre']; 
        $esDonante=$row_recordset32['esDonante']; 
        $tomaMedicamento=$row_recordset32['tomaMedicamento']; 
        
        $fechaNacimiento = $row_recordset32['fechaNacimiento']; 
        
          $entidadSalud     =$row_recordset32['entidadSalud']; 
          $seguro           =$row_recordset32['seguro']; 

          $nota           =$row_recordset32['nota']; 
          $enfermedadesPequeno           =$row_recordset32['enfermedadesPequeno']; 
          $alergias           =$row_recordset32['alergias']; 
          $motivoConsulta           =$row_recordset32['motivoConsulta']; 





          $peso           =$row_recordset32['peso']; 
          $altura           =$row_recordset32['altura']; 
          $imc           =$row_recordset32['imc']; 
          $ComposicionCorporal           =$row_recordset32['ComposicionCorporal']; 








  }







if(isset($_POST['btn-save']))
{ 
             



        $cliente_id=$_POST['cliente_id'];
        $usuario_id=$_POST['usuario_id'];
        $nombre_cliente=$_POST['nombre_cliente'];
        $celular_cliente=$_POST['celular_cliente'];
        $ciudad_cliente=$_POST['ciudad_cliente'];
        $correo_cliente=$_POST['correo_cliente'];
        $CODI_CLIENTE=$_POST['CODI_CLIENTE'];

            $id_uso_servicio=$_POST['id_uso_servicio'];

        $tipo_cliente=$_POST['tipo_cliente'];

            $fechar=$_POST['fechar'];

            //$fecha_actualizado=$_POST['fecha_actualizado'];
            //$activo=$_POST['activo'];

        $genero=$_POST['genero'];
        $direccion_cliente=$_POST['direccion_cliente'];
        $telefono_cliente=$_POST['telefono_cliente'];
        $edad_cliente=$_POST['edad_cliente'];
        $profesion_cliente=$_POST['profesion_cliente'];
        $acompananteFamiliar=$_POST['acompananteFamiliar'];
        $telefono_acompanante=$_POST['telefono_acompanante'];
        $antecedentes=$_POST['antecedentes']; 

            //$fotoperfil=$_POST['fotoperfil']; 

            $tiposSangre=$_POST['tiposSangre']; 
            $esDonante=$_POST['esDonante']; 
            $tomaMedicamento=$_POST['tomaMedicamento']; 
        
        $entidadSalud         =$_POST['entidadSalud']; 
        $seguro               =$_POST['seguro']; 
            $nota                 =$_POST['nota']; 
            $enfermedadesPequeno           =$_POST['enfermedadesPequeno']; 
            $alergias           =$_POST['alergias']; 
          $motivoConsulta           =$_POST['motivoConsulta']; 



        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $imc = $_POST['imc'];
        $ComposicionCorporal = $_POST['ComposicionCorporal'];


  if ($peso == '') {
            $peso = '0';
            $altura = '0';
            $imc = '0';
            $ComposicionCorporal = 'no determinado';
          }


  mysqli_query($conn3,"UPDATE cliente SET 
    nombre_cliente='$nombre_cliente',
    celular_cliente='$celular_cliente',
    ciudad_cliente='$ciudad_cliente',
    correo_cliente='$correo_cliente',
    CODI_CLIENTE='$CODI_CLIENTE',
    tipo_cliente='$tipo_cliente', 
    genero= '$genero',
    direccion_cliente='$direccion_cliente',
    telefono_cliente='$telefono_cliente',
    edad_cliente='$edad_cliente',
    profesion_cliente='$profesion_cliente',
    acompananteFamiliar='$acompananteFamiliar',
    telefono_acompanante='$telefono_acompanante',
    antecedentes='antecedentes',
    entidadSalud='$entidadSalud',
    tiposSangre = '$tiposSangre',
    esDonante = '$esDonante',
    tomaMedicamento = '$tomaMedicamento',
    nota = '$nota',
    enfermedadesPequeno = '$enfermedadesPequeno',
    alergias = '$alergias',
    motivoConsulta = '$motivoConsulta',
    seguro= '$seguro',
    peso = $peso,
    altura = $altura,
    imc = $imc,
    ComposicionCorporal = '$ComposicionCorporal' 
      WHERE usuario_id = $usuario_id and cliente_id = $cliente_id");
              
 
                                                         
                   echo "<script language='Javascript'> window.location='historiaClinica1?clienteId=$cliente_id';alert('Datos actualizados')</script>"; 

}

 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="patientes.php"> Paciente</a></li>
         <li  class="active"> Reg Paciente</li>
      </ol>
    </section>
  
<br>      
     
     
<section class="content">
 
<div  class="box box-info" align="center">
 
 <div class="card-body">
          <h4 class="card-title"> Verificar datos del paciente  </h4>
          
           <form action="verificarCliente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">


              <div class="form-group col-md-6">
                <div align="left">  Nombre del paciente </div>
                
                <input value="<?php echo $nombre_cliente?>" type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente"  placeholder="Nombre"  required>
                <input value="<?php echo $cliente_id?>" type="hidden" name="cliente_id"  required>
                <input value="<?php echo $usuario_id?>" type="hidden" name="usuario_id"  required>

              </div>



              <div class="form-group col-md-6">
                 <div align="left">  Email </div>
                <input value="<?php echo $correo_cliente?>" type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo" required>
              </div>


              <div class="form-group col-md-4">
                 <div align="left">   Numero de Cedula o ID</div>
                <input value="<?php echo $CODI_CLIENTE?>" type="text" class="form-control input-lg" id="CODI_CLIENTE" name="CODI_CLIENTE" placeholder="Cedula" required>
              </div>
               <div class="form-group col-md-4">
                 <div align="left">  Numero de Teléfono</div>
                <input value="<?php echo $telefono_cliente?>" type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" required>
              </div>
              <div class="form-group col-md-4">
                 <div align="left">  Numero de Celular</div>
                <input value="<?php echo $celular_cliente?>" type="text" class="form-control input-lg" id="celular_cliente" name="celular_cliente" placeholder="Celular" required>
              </div>
               

              
             
             <div class="form-group col-md-8">
              <div align="left">  Dirección </div>
                <input value="<?php echo $direccion_cliente?>" type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" required>
              </div> 
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input value="<?php echo $ciudad_cliente?>" type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" required>
              </div>
           


    
              <div class="form-group col-md-3">
                <div align="left">  Genero </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                 
                 
<?php
if ($genero == 'M') {
  echo '
  <option selected="selected">M</option>
  <option>F</option>';
}
elseif ($genero == 'F') {
  echo ' 
  <option>M</option>
  <option selected="selected">F</option>';
}
 

?>

              
                  
                   
                </select>

              </div>
              <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input value="<?php echo $fechaNacimiento?>" type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" required>
              </div>
        
              <div class="form-group col-md-2">
                  <div align="left">  Edad </div>
                <input value="<?php echo calculaedad($fechaNacimiento)?>" type="number" class="form-control input-lg" id="edad_cliente" name="edad_cliente" placeholder="Edad" required>
              </div>
        

        

              <div class="form-group col-md-4">
                 <div align="left">  Profesión  </div>
                <input value="<?php echo $profesion_cliente?>" type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente" placeholder="Profesion">
              </div>
              


              <div class="form-group col-md-4">
                <div align="left">Es Donante </div>
               
                <select  id="esDonante" name="esDonante" class="form-control input-lg select" style="width: 100%;">
                  

<?php
if ($esDonante == 'Si') {
  echo ' 
  <option selected="selected">Si</option>
  <option>No</option>
  <option>N/A</option>';
}
elseif ($esDonante == 'No') {
  echo ' 
  <option >Si</option>
  <option selected="selected">No</option>
  <option>N/A</option>';
}
elseif ($esDonante == 'N/A') {
  echo ' 
  <option>Si</option>
  <option>No</option>
  <option selected="selected">N/A</option>';
}


?>

              
                   
                </select>

              </div>
               <div class="form-group col-md-4">
                  <div align="left">  Tipo de Sangre </div>
                <input value="<?php echo $tiposSangre?>" type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" placeholder="tipo de Sangre" >
              </div>
              <div class="form-group col-md-4">
                <div align="left">Toma algún Medicamento </div>
               
                <input value="<?php echo $tomaMedicamento?>" type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento" >
              </div>
              

              
              
              <div class="form-group col-md-6">
                <div align="left">Acompañante Familiar </div>
                <input value="<?php echo $acompananteFamiliar?>" type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar">
              </div>
              <div class="form-group col-md-6">
                <div align="left">Teléfono Acompañante</div>
                <input value="<?php echo $telefono_acompanante?>" type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante">
              </div>
              


              <div class="form-group col-md-6">
                 <div align="left">Entidad de Salud (EPS o servicio de salid Publica) </div>
                <input value="<?php echo $entidadSalud?>" type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud(EPS o servicio de salid Publica)" >
              </div>
              <div class="form-group col-md-6">
                 <div align="left">Seguro </div>
                <input value="<?php echo $seguro?>" type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro">
              </div>
             









<div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso" name="peso" value="<?php echo $peso?>" onChange="calcularimc();" step="any">
              </div>


              <div class="form-group col-md-3">
                 <div align="left">Altura en centimetros </div>
                <input type="number" class="form-control input-lg" id="altura" name="altura" value="<?php echo $altura?>" onChange="calcularimc();" step="any">
              </div>
              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc" name="imc" value="<?php echo $imc?>" step="any">
              </div>


              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal" value="<?php echo $ComposicionCorporal?>">
              </div>





            <div class="form-group col-md-12">
                <div align="left">Alergias</div>
              </div>

            <!-- /.box-header -->

            <div class="box-body pad">
              
                <textarea id="alergias" name="alergias"  class="textarea" placeholder="Alergias" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $alergias?></textarea>
             
            </div>
            
            <div class="form-group col-md-12">
                <div align="left">Enfermedades de pequeño</div>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="enfermedadesPequeno" name="enfermedadesPequeno"  class="textarea" placeholder="Alergias" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $enfermedadesPequeno?></textarea>
             
            </div>
  
            <div class="form-group col-md-12">
                <div align="left"> Motivo Consulta</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $motivoConsulta?></textarea>
             
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Antecedentes</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="antecedentes" name="antecedentes"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $antecedentes?></textarea>
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Notas Adicionales </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="nota" name="nota"  class="textarea" placeholder="Notas Adicionales" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota?></textarea>
            </div>

<!--
            
            <div class="form-group col-md-12">
            <div align="left">Foto </div>
            </div>
            <input type="hidden" class="form-control input-lg" value="fotoperfil">
            <input type="file" class="form-control input-lg"  name="imagen">
            </div>

-->              
              
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              
              
              
             
              
              
                           
            
            <center><button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-primary btn-sm">Actualiza y continuar</button></center>
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
          </form>
        </div>
     


     <input type="hidden" name="ID_Doctor"  class="form-control input-lg input-lg"    value="<?php echo $_SESSION['ID'] ?>">


</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>










 <script>
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