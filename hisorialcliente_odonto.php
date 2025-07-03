<?php 
   include 'header.php';
   include 'menu.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol>
    </section>
<link rel="stylesheet" type="text/css" href="prueba/files/bower_components/bootstrap/css/bootstrap.min.css">

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
      
<?php
       
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_SESSION['ID']; 

   $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente_odonto where cliente_odonto_id=$clienteId");

        $rowCliente=mysqli_fetch_assoc($queryList);

      

            $cliente_odonto_id=$rowCliente['cliente_odonto_id'];
            $usuario_id=$rowCliente['usuario_id'];
            $nombre_cliente_odonto=$rowCliente['nombre_cliente_odonto'];
            $celular_cliente_odonto=$rowCliente['celular_cliente_odonto'];
            $ciudad_cliente_odonto=$rowCliente['ciudad_cliente_odonto'];
            $correo_cliente_odonto=$rowCliente['correo_cliente_odonto'];
            $CODI_cliente_odonto=$rowCliente['CODI_cliente_odonto'];
            $tipo_cliente_odonto=$rowCliente['tipo_cliente_odonto'];
            $fechar=$rowCliente['fechar'];
            $fecha_actualizado=$rowCliente['fecha_actualizado'];
            $activo=$rowCliente['activo'];
            $genero=$rowCliente['genero'];
            $direccion_cliente_odonto=$rowCliente['direccion_cliente_odonto'];
            $telefono_cliente_odonto=$rowCliente['telefono_cliente_odonto'];
            $edad_cliente_odonto=$rowCliente['edad_cliente_odonto'];
            $profesion_cliente_odonto=$rowCliente['profesion_cliente_odonto'];
            $acompananteFamiliar=$rowCliente['acompananteFamiliar'];
            $telefono_acompanante=$rowCliente['telefono_acompanante'];
            $parentesco_acompanante=$rowCliente['parentesco_acompanante'];
            $antecedentes=$rowCliente['antecedentes'];
            $entidadSalud=$rowCliente['entidadSalud'];
            $seguro=$rowCliente['seguro'];
            $nota=$rowCliente['nota'];
            $alergias=$rowCliente['alergias'];
            $tiposSangre=$rowCliente['tiposSangre'];
            $fotoperfil=$rowCliente['fotoperfil'];
            $fechaNacimiento=$rowCliente['fechaNacimiento'];
            $whatsapp=$rowCliente['whatsapp'];
            $tipoUsuario=$rowCliente['tipoUsuario'];
            $estado=$rowCliente['estado'];
            $sucursal=$rowCliente['sucursal'];
            $nacionalidad=$rowCliente['nacionalidad'];
            $d11=$rowCliente['d11'];
            $d12=$rowCliente['d12'];
            $d13=$rowCliente['d13'];
            $d14=$rowCliente['d14'];
            $d15=$rowCliente['d15'];
            $d16=$rowCliente['d16'];
            $d17=$rowCliente['d17'];
            $d18=$rowCliente['d18'];
            $d21=$rowCliente['d21'];
            $d22=$rowCliente['d22'];
            $d23=$rowCliente['d23'];
            $d24=$rowCliente['d24'];
            $d25=$rowCliente['d25'];
            $d26=$rowCliente['d26'];
            $d27=$rowCliente['d27'];
            $d28=$rowCliente['d28'];
            $d31=$rowCliente['d31'];
            $d32=$rowCliente['d32'];
            $d33=$rowCliente['d33'];
            $d34=$rowCliente['d34'];
            $d35=$rowCliente['d35'];
            $d36=$rowCliente['d36'];
            $d37=$rowCliente['d37'];
            $d38=$rowCliente['d38'];
            $d41=$rowCliente['d41'];
            $d42=$rowCliente['d42'];
            $d43=$rowCliente['d43'];
            $d44=$rowCliente['d44'];
            $d45=$rowCliente['d45'];
            $d46=$rowCliente['d46'];
            $d47=$rowCliente['d47'];
            $d48=$rowCliente['d48'];
            $d51=$rowCliente['d51'];
            $d52=$rowCliente['d52'];
            $d53=$rowCliente['d53'];
            $d54=$rowCliente['d54'];
            $d55=$rowCliente['d55'];
            $d61=$rowCliente['d61'];
            $d62=$rowCliente['d62'];
            $d63=$rowCliente['d63'];
            $d64=$rowCliente['d64'];
            $d65=$rowCliente['d65'];
            $d71=$rowCliente['d71'];
            $d72=$rowCliente['d72'];
            $d73=$rowCliente['d73'];
            $d74=$rowCliente['d74'];
            $d75=$rowCliente['d75'];
            $d81=$rowCliente['d81'];
            $d82=$rowCliente['d82'];
            $d83=$rowCliente['d83'];
            $d84=$rowCliente['d84'];
            $d85=$rowCliente['d85'];
            $n11=$rowCliente['n11'];
            $n12=$rowCliente['n12'];
            $n13=$rowCliente['n13'];
            $n14=$rowCliente['n14'];
            $n15=$rowCliente['n15'];
            $n16=$rowCliente['n16'];
            $n17=$rowCliente['n17'];
            $n18=$rowCliente['n18'];
            $n21=$rowCliente['n21'];
            $n22=$rowCliente['n22'];
            $n23=$rowCliente['n23'];
            $n24=$rowCliente['n24'];
            $n25=$rowCliente['n25'];
            $n26=$rowCliente['n26'];
            $n27=$rowCliente['n27'];
            $n28=$rowCliente['n28'];
            $n31=$rowCliente['n31'];
            $n32=$rowCliente['n32'];
            $n33=$rowCliente['n33'];
            $n34=$rowCliente['n34'];
            $n35=$rowCliente['n35'];
            $n36=$rowCliente['n36'];
            $n37=$rowCliente['n37'];
            $n38=$rowCliente['n38'];
            $n41=$rowCliente['n41'];
            $n42=$rowCliente['n42'];
            $n43=$rowCliente['n43'];
            $n44=$rowCliente['n44'];
            $n45=$rowCliente['n45'];
            $n46=$rowCliente['n46'];
            $n47=$rowCliente['n47'];
            $n48=$rowCliente['n48'];
            $n51=$rowCliente['n51'];
            $n52=$rowCliente['n52'];
            $n53=$rowCliente['n53'];
            $n54=$rowCliente['n54'];
            $n55=$rowCliente['n55'];
            $n61=$rowCliente['n61'];
            $n62=$rowCliente['n62'];
            $n63=$rowCliente['n63'];
            $n64=$rowCliente['n64'];
            $n65=$rowCliente['n65'];
            $n71=$rowCliente['n71'];
            $n72=$rowCliente['n72'];
            $n73=$rowCliente['n73'];
            $n74=$rowCliente['n74'];
            $n75=$rowCliente['n75'];
            $n81=$rowCliente['n81'];
            $n82=$rowCliente['n82'];
            $n83=$rowCliente['n83'];
            $n84=$rowCliente['n84'];
            $n85=$rowCliente['n85'];

 

           

        ?>





 <div class="card-body">
                  <div class="box-body">
                     

         
              <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente_odonto; ?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente_odonto;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular_cliente_odonto;?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente_odonto;?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar;?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_cliente_odonto;?></label>
               
               <br>
               <!--<label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante;?></label>-->
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud;?></label>
               
              

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente_odonto ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente_odonto ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php echo $edad_cliente_odonto;?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente_odonto ;?></label>

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














             <div align="center">
  <a class="btn btn-primary" href="VerInformeOdontologico.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a>
  <a class="btn btn-primary" href="pacientes_Odonto.php" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a><!--
  <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>-->
                                       
     </div>
<br>
                   <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#odonto" data-toggle="tab">Odontograma</a></li>
              <li class=""><a href="#histora" data-toggle="tab">Hstorial</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">


















          <div class="active tab-pane" id="odonto">
          
          
           

<?php $valor=1; ?>



           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">


<h4 align="center"> Estado Actual de los Dientes</h4>

<table border="1" class="tg" width="100%">
  <tr>
     <?php 
          $cons_d18=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=18");
          $resd18=mysqli_fetch_assoc($cons_d18);
          $var="style='background-color: red;'";
          $completa=$resd18['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd18['p_inferior'];
          $p_superior=$resd18['p_superior'];
          $c_derecho=$resd18['c_derecho'];
          $c_izquierdo=$resd18['c_izquierdo'];
          $frontal=$resd18['frontal'];
          }
       ?>
    <th align="center">
      <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=18" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
         
             <tr>
            <td align='center'></td>
            <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
            <td align='center'></td>
          </tr>  
          <tr>
            <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
            <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
            <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
          </tr>  
          <tr>
            <td align='center'></td>
            <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
            <td align='center'></td>
          </tr>
        </table>">
        <img src='oG<?php echo $d18; ?>/18.png' >
      </a>
      <br> 18   
    </th>
     <?php 
          $cons_d17=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=17");
          $resd17=mysqli_fetch_assoc($cons_d17);
          $var="style='background-color: red;'";
          $completa=$resd17['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd17['p_inferior'];
          $p_superior=$resd17['p_superior'];
          $c_derecho=$resd17['c_derecho'];
          $c_izquierdo=$resd17['c_izquierdo'];
          $frontal=$resd17['frontal'];
          }
       ?>

    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=17" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d17; ?>/17.png' ></a><br> 17  </th>
     <?php 
          $cons_d16=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=16");
          $resd16=mysqli_fetch_assoc($cons_d16);
          $var="style='background-color: red;'";
          $completa=$resd16['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd16['p_inferior'];
          $p_superior=$resd16['p_superior'];
          $c_derecho=$resd16['c_derecho'];
          $c_izquierdo=$resd16['c_izquierdo'];
          $frontal=$resd16['frontal'];
          }
       ?>
    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=16" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d16; ?>/16.png' ></a><br> 16  </th>
     <?php 
          $cons_d15=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=15");
          $resd15=mysqli_fetch_assoc($cons_d15);
          $var="style='background-color: red;'";
          $completa=$resd15['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd15['p_inferior'];
          $p_superior=$resd15['p_superior'];
          $c_derecho=$resd15['c_derecho'];
          $c_izquierdo=$resd15['c_izquierdo'];
          $frontal=$resd15['frontal'];
          }
       ?>

    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=15" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d15; ?>/15.png' ></a><br> 15  </th>
     <?php 
          $cons_d14=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=14");
          $resd14=mysqli_fetch_assoc($cons_d14);
          $var="style='background-color: red;'";
          $completa=$resd14['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd14['p_inferior'];
          $p_superior=$resd14['p_superior'];
          $c_derecho=$resd14['c_derecho'];
          $c_izquierdo=$resd14['c_izquierdo'];
          $frontal=$resd14['frontal'];
          }
       ?>
    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=14" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d14; ?>/14.png' ></a><br> 14  </th>
      <?php 
          $cons_d13=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=13");
          $resd13=mysqli_fetch_assoc($cons_d13);
          $var="style='background-color: red;'";
          $completa=$resd13['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd13['p_inferior'];
          $p_superior=$resd13['p_superior'];
          $c_derecho=$resd13['c_derecho'];
          $c_izquierdo=$resd13['c_izquierdo'];
          $frontal=$resd13['frontal'];
          }
       ?>
    <th  align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=13" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d13; ?>/13.png' ></a><br> 13  </th>

     <?php 
          $cons_d12=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=12");
          $resd12=mysqli_fetch_assoc($cons_d12);
          $var="style='background-color: red;'";
          $completa=$resd12['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd12['p_inferior'];
          $p_superior=$resd12['p_superior'];
          $c_derecho=$resd12['c_derecho'];
          $c_izquierdo=$resd12['c_izquierdo'];
          $frontal=$resd12['frontal'];
          }
       ?>

     
    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=12" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
      "><img src='oG<?php echo $d12; ?>/12.png' ></a><br> 12  </th>

     <?php 
          $cons_d11=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=11");
          $resd11=mysqli_fetch_assoc($cons_d11);
          $var="style='background-color: red;'";
          $completa=$resd11['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd11['p_inferior'];
          $p_superior=$resd11['p_superior'];
          $c_derecho=$resd11['c_derecho'];
          $c_izquierdo=$resd11['c_izquierdo'];
          $frontal=$resd11['frontal'];
          }
       ?>

    <th align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=11" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d11; ?>/11.png' ></a><br> 11  </th>

     <?php 
          $cons_d21=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=21");
          $resd21=mysqli_fetch_assoc($cons_d21);
          $var="style='background-color: red;'";
          $completa=$resd21['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd21['p_inferior'];
          $p_superior=$resd21['p_superior'];
          $c_derecho=$resd21['c_derecho'];
          $c_izquierdo=$resd21['c_izquierdo'];
          $frontal=$resd21['frontal'];
          }
       ?>

     
    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=21" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d21; ?>/21.png' ></a><br> 21    </th>

     <?php 
          $cons_d22=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=22");
          $resd22=mysqli_fetch_assoc($cons_d22);
          $var="style='background-color: red;'";
          $completa=$resd22['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd22['p_inferior'];
          $p_superior=$resd22['p_superior'];
          $c_derecho=$resd22['c_derecho'];
          $c_izquierdo=$resd22['c_izquierdo'];
          $frontal=$resd22['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=22" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d22; ?>/22.png' ></a><br> 22    </th>

     <?php 
          $cons_d23=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=23");
          $resd23=mysqli_fetch_assoc($cons_d23);
          $var="style='background-color: red;'";
          $completa=$resd23['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd23['p_inferior'];
          $p_superior=$resd23['p_superior'];
          $c_derecho=$resd23['c_derecho'];
          $c_izquierdo=$resd23['c_izquierdo'];
          $frontal=$resd23['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=23" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d23; ?>/23.png' ></a><br> 23    </th>

     <?php 
          $cons_d24=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=24");
          $resd24=mysqli_fetch_assoc($cons_d24);
          $var="style='background-color: red;'";
          $completa=$resd24['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd24['p_inferior'];
          $p_superior=$resd24['p_superior'];
          $c_derecho=$resd24['c_derecho'];
          $c_izquierdo=$resd24['c_izquierdo'];
          $frontal=$resd24['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=24" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d24; ?>/24.png' ></a><br> 24   </th>

     <?php 
          $cons_d25=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=25");
          $resd25=mysqli_fetch_assoc($cons_d25);
          $var="style='background-color: red;'";
          $completa=$resd25['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd25['p_inferior'];
          $p_superior=$resd25['p_superior'];
          $c_derecho=$resd25['c_derecho'];
          $c_izquierdo=$resd25['c_izquierdo'];
          $frontal=$resd25['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=25" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d25; ?>/25.png' ></a><br> 25   </th>

     <?php 
          $cons_d26=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=26");
          $resd26=mysqli_fetch_assoc($cons_d26);
          $var="style='background-color: red;'";
          $completa=$resd26['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd26['p_inferior'];
          $p_superior=$resd26['p_superior'];
          $c_derecho=$resd26['c_derecho'];
          $c_izquierdo=$resd26['c_izquierdo'];
          $frontal=$resd26['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=26" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d26; ?>/26.png' ></a><br> 26   </th>

     <?php 
          $cons_d27=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=27");
          $resd27=mysqli_fetch_assoc($cons_d27);
          $var="style='background-color: red;'";
          $completa=$resd27['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd27['p_inferior'];
          $p_superior=$resd27['p_superior'];
          $c_derecho=$resd27['c_derecho'];
          $c_izquierdo=$resd27['c_izquierdo'];
          $frontal=$resd27['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=27"                 data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d27; ?>/27.png' ></a><br> 27   </th>

     <?php 
          $cons_d28=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=28");
          $resd28=mysqli_fetch_assoc($cons_d28);
          $var="style='background-color: red;'";
          $completa=$resd28['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd28['p_inferior'];
          $p_superior=$resd28['p_superior'];
          $c_derecho=$resd28['c_derecho'];
          $c_izquierdo=$resd28['c_izquierdo'];
          $frontal=$resd28['frontal'];
          }
       ?>

    <th align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=28" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d28; ?>/28.png' ></a><br> 28   </th>

     <?php 
          $cons_d55=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=55");
          $resd55=mysqli_fetch_assoc($cons_d55);
          $var="style='background-color: red;'";
          $completa=$resd55['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd55['p_inferior'];
          $p_superior=$resd55['p_superior'];
          $c_derecho=$resd55['c_derecho'];
          $c_izquierdo=$resd55['c_izquierdo'];
          $frontal=$resd55['frontal'];
          }
       ?>

    
  </tr>
  <tr>
    <td colspan="3" rowspan="2"></td>
    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=55" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d55; ?>/55.png' ></a><br> 55 </td>

     <?php 
          $cons_d54=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=54");
          $resd54=mysqli_fetch_assoc($cons_d54);
          $var="style='background-color: red;'";
          $completa=$resd54['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd54['p_inferior'];
          $p_superior=$resd54['p_superior'];
          $c_derecho=$resd54['c_derecho'];
          $c_izquierdo=$resd54['c_izquierdo'];
          $frontal=$resd54['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=54" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d54; ?>/54.png' ></a><br> 54 </td>

     <?php 
          $cons_d53=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=53");
          $resd53=mysqli_fetch_assoc($cons_d53);
          $var="style='background-color: red;'";
          $completa=$resd53['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd53['p_inferior'];
          $p_superior=$resd53['p_superior'];
          $c_derecho=$resd53['c_derecho'];
          $c_izquierdo=$resd53['c_izquierdo'];
          $frontal=$resd53['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=53" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d53; ?>/53.png' ></a><br> 53 </td>

     <?php 
          $cons_d52=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=52");
          $resd52=mysqli_fetch_assoc($cons_d52);
          $var="style='background-color: red;'";
          $completa=$resd52['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd52['p_inferior'];
          $p_superior=$resd52['p_superior'];
          $c_derecho=$resd52['c_derecho'];
          $c_izquierdo=$resd52['c_izquierdo'];
          $frontal=$resd52['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=52" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d52; ?>/52.png' ></a><br> 52 </td>

     <?php 
          $cons_d51=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=51");
          $resd51=mysqli_fetch_assoc($cons_d51);
          $var="style='background-color: red;'";
          $completa=$resd51['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd51['p_inferior'];
          $p_superior=$resd51['p_superior'];
          $c_derecho=$resd51['c_derecho'];
          $c_izquierdo=$resd51['c_izquierdo'];
          $frontal=$resd51['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=51" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d51; ?>/51.png' ></a><br> 51 </td>

     <?php 
          $cons_d61=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=61");
          $resd61=mysqli_fetch_assoc($cons_d61);
          $var="style='background-color: red;'";
          $completa=$resd61['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd61['p_inferior'];
          $p_superior=$resd61['p_superior'];
          $c_derecho=$resd61['c_derecho'];
          $c_izquierdo=$resd61['c_izquierdo'];
          $frontal=$resd61['frontal'];
          }
       ?>

    
    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=61" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d61; ?>/61.png' ></a><br> 61 </td>

     <?php 
          $cons_d62=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=62");
          $resd62=mysqli_fetch_assoc($cons_d62);
          $var="style='background-color: red;'";
          $completa=$resd62['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd62['p_inferior'];
          $p_superior=$resd62['p_superior'];
          $c_derecho=$resd62['c_derecho'];
          $c_izquierdo=$resd62['c_izquierdo'];
          $frontal=$resd62['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=62" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d62; ?>/62.png' ></a><br> 62 </td>

     <?php 
          $cons_d63=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=63");
          $resd63=mysqli_fetch_assoc($cons_d63);
          $var="style='background-color: red;'";
          $completa=$resd63['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd63['p_inferior'];
          $p_superior=$resd63['p_superior'];
          $c_derecho=$resd63['c_derecho'];
          $c_izquierdo=$resd63['c_izquierdo'];
          $frontal=$resd63['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=63" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d63; ?>/63.png' ></a><br> 63 </td>

     <?php 
          $cons_d64=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=64");
          $resd64=mysqli_fetch_assoc($cons_d64);
          $var="style='background-color: red;'";
          $completa=$resd64['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd64['p_inferior'];
          $p_superior=$resd64['p_superior'];
          $c_derecho=$resd64['c_derecho'];
          $c_izquierdo=$resd64['c_izquierdo'];
          $frontal=$resd64['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=64" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d64; ?>/64.png' ></a><br> 64 </td>

     <?php 
          $cons_d65=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=65");
          $resd65=mysqli_fetch_assoc($cons_d65);
          $var="style='background-color: red;'";
          $completa=$resd65['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd65['p_inferior'];
          $p_superior=$resd65['p_superior'];
          $c_derecho=$resd65['c_derecho'];
          $c_izquierdo=$resd65['c_izquierdo'];
          $frontal=$resd65['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=65" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d65; ?>/65.png' ></a><br> 65 </td>

     <?php 
          $cons_d85=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=85");
          $resd85=mysqli_fetch_assoc($cons_d85);
          $var="style='background-color: red;'";
          $completa=$resd85['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd85['p_inferior'];
          $p_superior=$resd85['p_superior'];
          $c_derecho=$resd85['c_derecho'];
          $c_izquierdo=$resd85['c_izquierdo'];
          $frontal=$resd85['frontal'];
          }
       ?>

    
    <td colspan="3" rowspan="2"></td>
  </tr>
  <tr>
    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=85" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d85; ?>/85.png' ></a><br> 85 </td>

     <?php 
          $cons_d84=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=84");
          $resd84=mysqli_fetch_assoc($cons_d84);
          $var="style='background-color: red;'";
          $completa=$resd84['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd84['p_inferior'];
          $p_superior=$resd84['p_superior'];
          $c_derecho=$resd84['c_derecho'];
          $c_izquierdo=$resd84['c_izquierdo'];
          $frontal=$resd84['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=84" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d84; ?>/84.png' ></a><br> 84 </td>

     <?php 
          $cons_d83=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=83");
          $resd83=mysqli_fetch_assoc($cons_d83);
          $var="style='background-color: red;'";
          $completa=$resd83['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd83['p_inferior'];
          $p_superior=$resd83['p_superior'];
          $c_derecho=$resd83['c_derecho'];
          $c_izquierdo=$resd83['c_izquierdo'];
          $frontal=$resd83['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=83" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d83; ?>/83.png' ></a><br> 83 </td>

     <?php 
          $cons_d82=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=82");
          $resd82=mysqli_fetch_assoc($cons_d82);
          $var="style='background-color: red;'";
          $completa=$resd82['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd82['p_inferior'];
          $p_superior=$resd82['p_superior'];
          $c_derecho=$resd82['c_derecho'];
          $c_izquierdo=$resd82['c_izquierdo'];
          $frontal=$resd82['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=82" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d82; ?>/82.png' ></a><br> 82 </td>

     <?php 
          $cons_d81=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=81");
          $resd81=mysqli_fetch_assoc($cons_d81);
          $var="style='background-color: red;'";
          $completa=$resd81['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd81['p_inferior'];
          $p_superior=$resd81['p_superior'];
          $c_derecho=$resd81['c_derecho'];
          $c_izquierdo=$resd81['c_izquierdo'];
          $frontal=$resd81['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=81" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d81; ?>/81.png' ></a><br> 81 </td>

     <?php 
          $cons_d71=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=71");
          $resd71=mysqli_fetch_assoc($cons_d71);
          $var="style='background-color: red;'";
          $completa=$resd71['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd71['p_inferior'];
          $p_superior=$resd71['p_superior'];
          $c_derecho=$resd71['c_derecho'];
          $c_izquierdo=$resd71['c_izquierdo'];
          $frontal=$resd71['frontal'];
          }
       ?>

    
    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=71" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d71; ?>/71.png' ></a> <br> 71 </td>

     <?php 
          $cons_d72=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=72");
          $resd72=mysqli_fetch_assoc($cons_d72);
          $var="style='background-color: red;'";
          $completa=$resd72['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd72['p_inferior'];
          $p_superior=$resd72['p_superior'];
          $c_derecho=$resd72['c_derecho'];
          $c_izquierdo=$resd72['c_izquierdo'];
          $frontal=$resd72['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=72" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d72; ?>/72.png' ></a> <br> 72 </td>

     <?php 
          $cons_d73=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=73");
          $resd73=mysqli_fetch_assoc($cons_d73);
          $var="style='background-color: red;'";
          $completa=$resd73['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd73['p_inferior'];
          $p_superior=$resd73['p_superior'];
          $c_derecho=$resd73['c_derecho'];
          $c_izquierdo=$resd73['c_izquierdo'];
          $frontal=$resd73['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=73" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d73; ?>/73.png' ></a> <br> 73 </td>

     <?php 
          $cons_d74=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=74");
          $resd74=mysqli_fetch_assoc($cons_d74);
          $var="style='background-color: red;'";
          $completa=$resd74['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd74['p_inferior'];
          $p_superior=$resd74['p_superior'];
          $c_derecho=$resd74['c_derecho'];
          $c_izquierdo=$resd74['c_izquierdo'];
          $frontal=$resd74['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=74" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d74; ?>/74.png' ></a> <br> 74 </td>

     <?php 
          $cons_d75=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=75");
          $resd75=mysqli_fetch_assoc($cons_d75);
          $var="style='background-color: red;'";
          $completa=$resd75['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd75['p_inferior'];
          $p_superior=$resd75['p_superior'];
          $c_derecho=$resd75['c_derecho'];
          $c_izquierdo=$resd75['c_izquierdo'];
          $frontal=$resd75['frontal'];
          }
       ?>

    <td align="center"><a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=75" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d75; ?>/75.png' ></a> <br> 75 </td>

     <?php 
          $cons_d48=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=48");
          $resd48=mysqli_fetch_assoc($cons_d48);
          $var="style='background-color: red;'";
          $completa=$resd48['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd48['p_inferior'];
          $p_superior=$resd48['p_superior'];
          $c_derecho=$resd48['c_derecho'];
          $c_izquierdo=$resd48['c_izquierdo'];
          $frontal=$resd48['frontal'];
          }
       ?>

  </tr>
  <tr>
    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=48" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d48; ?>/48.png'  ></a> 48   </td>

     <?php 
          $cons_d47=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=47");
          $resd47=mysqli_fetch_assoc($cons_d47);
          $var="style='background-color: red;'";
          $completa=$resd47['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd47['p_inferior'];
          $p_superior=$resd47['p_superior'];
          $c_derecho=$resd47['c_derecho'];
          $c_izquierdo=$resd47['c_izquierdo'];
          $frontal=$resd47['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=47" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d47; ?>/47.png'  ></a> 47  </td>

     <?php 
          $cons_d46=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=46");
          $resd46=mysqli_fetch_assoc($cons_d46);
          $var="style='background-color: red;'";
          $completa=$resd46['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd46['p_inferior'];
          $p_superior=$resd46['p_superior'];
          $c_derecho=$resd46['c_derecho'];
          $c_izquierdo=$resd46['c_izquierdo'];
          $frontal=$resd46['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=46" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d46; ?>/46.png'  ></a> 46  </td>

     <?php 
          $cons_d45=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=45");
          $resd45=mysqli_fetch_assoc($cons_d45);
          $var="style='background-color: red;'";
          $completa=$resd45['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd45['p_inferior'];
          $p_superior=$resd45['p_superior'];
          $c_derecho=$resd45['c_derecho'];
          $c_izquierdo=$resd45['c_izquierdo'];
          $frontal=$resd45['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=45" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d45; ?>/45.png'  ></a> 45  </td>

     <?php 
          $cons_d44=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=44");
          $resd44=mysqli_fetch_assoc($cons_d44);
          $var="style='background-color: red;'";
          $completa=$resd44['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd44['p_inferior'];
          $p_superior=$resd44['p_superior'];
          $c_derecho=$resd44['c_derecho'];
          $c_izquierdo=$resd44['c_izquierdo'];
          $frontal=$resd44['frontal'];
          }
       ?>

    <td align="center">  <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=44" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d44; ?>/44.png'  ></a> 44  </td>

     <?php 
          $cons_d43=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=43");
          $resd43=mysqli_fetch_assoc($cons_d43);
          $var="style='background-color: red;'";
          $completa=$resd43['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd43['p_inferior'];
          $p_superior=$resd43['p_superior'];
          $c_derecho=$resd43['c_derecho'];
          $c_izquierdo=$resd43['c_izquierdo'];
          $frontal=$resd43['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=43" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%' style='margin-left=70%;'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d43; ?>/43.png'  ></a> 43  </td>

     <?php 
          $cons_d42=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=42");
          $resd42=mysqli_fetch_assoc($cons_d42);
          $var="style='background-color: red;'";
          $completa=$resd42['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd42['p_inferior'];
          $p_superior=$resd42['p_superior'];
          $c_derecho=$resd42['c_derecho'];
          $c_izquierdo=$resd42['c_izquierdo'];
          $frontal=$resd42['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=42" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d42; ?>/42.png'  ></a> 42  </td>

     <?php 
          $cons_d41=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=41");
          $resd41=mysqli_fetch_assoc($cons_d41);
          $var="style='background-color: red;'";
          $completa=$resd41['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd41['p_inferior'];
          $p_superior=$resd41['p_superior'];
          $c_derecho=$resd41['c_derecho'];
          $c_izquierdo=$resd41['c_izquierdo'];
          $frontal=$resd41['frontal'];
          }
       ?>

    <td align="center">  <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=41" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d41; ?>/41.png'  ></a> 41  </td>

     <?php 
          $cons_d31=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=31");
          $resd31=mysqli_fetch_assoc($cons_d31);
          $var="style='background-color: red;'";
          $completa=$resd31['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd31['p_inferior'];
          $p_superior=$resd31['p_superior'];
          $c_derecho=$resd31['c_derecho'];
          $c_izquierdo=$resd31['c_izquierdo'];
          $frontal=$resd31['frontal'];
          }
       ?>

     


    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=31" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d31; ?>/31.png'  ></a> <br>31    </td>

     <?php 
          $cons_d32=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=32");
          $resd32=mysqli_fetch_assoc($cons_d32);
          $var="style='background-color: red;'";
          $completa=$resd32['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd32['p_inferior'];
          $p_superior=$resd32['p_superior'];
          $c_derecho=$resd32['c_derecho'];
          $c_izquierdo=$resd32['c_izquierdo'];
          $frontal=$resd32['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=32" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d32; ?>/32.png' ></a> <br> 32    </td>

     <?php 
          $cons_d33=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=33");
          $resd33=mysqli_fetch_assoc($cons_d33);
          $var="style='background-color: red;'";
          $completa=$resd33['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd33['p_inferior'];
          $p_superior=$resd33['p_superior'];
          $c_derecho=$resd33['c_derecho'];
          $c_izquierdo=$resd33['c_izquierdo'];
          $frontal=$resd33['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=33" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d33; ?>/33.png'  ></a> <br> 33    </td>

     <?php 
          $cons_d34=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=34");
          $resd34=mysqli_fetch_assoc($cons_d34);
          $var="style='background-color: red;'";
          $completa=$resd34['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd34['p_inferior'];
          $p_superior=$resd34['p_superior'];
          $c_derecho=$resd34['c_derecho'];
          $c_izquierdo=$resd34['c_izquierdo'];
          $frontal=$resd34['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=34" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d34; ?>/34.png' ></a> <br> 34   </td>

     <?php 
          $cons_d35=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=35");
          $resd35=mysqli_fetch_assoc($cons_d35);
          $var="style='background-color: red;'";
          $completa=$resd35['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd35['p_inferior'];
          $p_superior=$resd35['p_superior'];
          $c_derecho=$resd35['c_derecho'];
          $c_izquierdo=$resd35['c_izquierdo'];
          $frontal=$resd35['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=35" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d35; ?>/35.png'  ></a> <br> 35   </td>

     <?php 
          $cons_d36=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=36");
          $resd36=mysqli_fetch_assoc($cons_d36);
          $var="style='background-color: red;'";
          $completa=$resd36['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd36['p_inferior'];
          $p_superior=$resd36['p_superior'];
          $c_derecho=$resd36['c_derecho'];
          $c_izquierdo=$resd36['c_izquierdo'];
          $frontal=$resd36['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=36" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d36; ?>/36.png' ></a> <br> 36   </td>

     <?php 
          $cons_d37=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=37");
          $resd37=mysqli_fetch_assoc($cons_d37);
          $var="style='background-color: red;'";
          $completa=$resd37['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd37['p_inferior'];
          $p_superior=$resd37['p_superior'];
          $c_derecho=$resd37['c_derecho'];
          $c_izquierdo=$resd37['c_izquierdo'];
          $frontal=$resd37['frontal'];
          }
       ?>

    <td align="center" >  <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=37" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<h4 align='center'>Ultima Parte Tratada</h4><table width='60%'>
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d37; ?>/37.png' ></a> <br> 37   </td>

     <?php 
          $cons_d38=mysqli_query($conn3,"SELECT max(id), p_inferior, p_superior, c_izquierdo, c_derecho, frontal, completa from historiaClinica_odonto where numero=38");
          $resd38=mysqli_fetch_assoc($cons_d38);
          $var="style='background-color: red;'";
          $completa=$resd38['completa'];
          if ($completa==1) {
            $p_inferior=1;
            $p_superior=1;
            $c_derecho=1;
            $c_izquierdo=1;
            $frontal=1;
          }else{
          $p_inferior=$resd38['p_inferior'];
          $p_superior=$resd38['p_superior'];
          $c_derecho=$resd38['c_derecho'];
          $c_izquierdo=$resd38['c_izquierdo'];
          $frontal=$resd38['frontal'];
          }
       ?>

    <td align="center"> <a href="historiaClinica_odonto?cliente_odonto_id=<?php echo $cliente_odonto_id;?>&pzs=38" class="waves-effect waves-light" data-toggle="tooltip" data-html="true" title="<p style='margin-left: -30%;font-size:16px;'><strong>Ultima Parte Tratada</strong></p><table width='60%'>
     
    <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_superior==1){ echo $var;}?>>&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>  
      <tr>
        <td align='right' <?php if ($c_izquierdo==1){ echo $var;}?>  >&nbsp;&nbsp;</td>
        <td align='center' <?php if ($frontal==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='left'  <?php if ($c_derecho==1){ echo $var;}?> >&nbsp;&nbsp;</td>
      </tr>  
      <tr>
        <td align='center'></td>
        <td align='center' <?php if ($p_inferior==1){ echo $var;}?> >&nbsp;&nbsp;</td>
        <td align='center'></td>
      </tr>
    </table>"><img src='oG<?php echo $d38; ?>/38.png' ></a> <br> 38</td>
    

  </tr>
</table>



                  </div>
                </div>
                 </div>
            </div>
            <!-- /.box-body aqui termina-->


          <div class="tab-pane" id="histora">
          
           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">


             <?php $his=mysqli_query($conn3,"SELECT * FROM  historiaClinica_odonto where cliente_id=$clienteId");

            while ($historial=mysqli_fetch_assoc($his)) {  

                $Fecha=$historial['Fecha'];
                $Hora=$historial['Hora'];
                $ID=$historial['id'];
                $tipo=$historial['motivoConsulta'];

                      $Pieza                 = $historial['numero']; 
                      $tejido_blando         = $historial['tejido_blando'];
                      $examen_dental         = $historial['examen_dental'];
                      $examen_inter_arco     = $historial['examen_inter_arco'];
                      $examen_intra_arco     = $historial['examen_intra_arco'];
                      $analisis_paladar      = $historial['analisis_paladar'];




              ?>

              <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>Pieza <?php echo $Pieza;  ?> <a href="finalizar_donto.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>

            <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              <div align="center"> Datos de Consulta</div>
              
                
                  <img src="oG0/<?php echo $Pieza; ?>.png">
                  <label>Pieza N° : </label><?php echo $Pieza; ?><br>
                  
              
                  <label>Tipo de Consulta</label>
                <?php $tpo=mysqli_query($conn3,"SELECT * FROM  servicios_odonto where id = $tipo ");
                $valor=mysqli_fetch_assoc($tpo);
                $variable=$valor['detalle'];
                echo $variable;?><br>

                  <label>Tratamiento : </label><?php echo $historial['tratamiento']; ?><br>
                  <label>Detalle de Tratamiento : </label><?php echo $historial['detalleTratamiento']; ?><br>
                  <label>Partes de la Pieza Tratada : </label><?php if ($historial['completo']==1){
                    echo "Pieza Completa";
                  }else{
                    if ($historial['p_inferior']==1) {
                      echo "Parte Inferior | ";
                     
                    }if ($historial['p_superior']==1) {
                      echo "Parte Superior | ";
                     
                    }if ($historial['c_derecho']==1) {
                      echo "Costado Derecho | ";
                     
                    }if ($historial['c_izquierdo']==1) {
                      echo "Costado Izquierdo | ";
                     
                    }if ($historial['frontal']==1) {
                      echo "Parte Frontal | ";
                     
                    }
                  } ?>


             

              <div align="center"> Examen Tejidos Blandos</div>
                <div>
                  <label>  <?php echo $tejido_blando; ?></label>
                </div>
              <div align="center"> Examen Dental</div>
                <div>
                  <label>  <?php echo $examen_dental; ?></label>
                </div>
              <div align="center"> Examen Inter-Arco</div>
                <div>
                  <label>  <?php echo $examen_inter_arco; ?></label>
                </div>
              <div align="center"> Examen Intra-Arco</div>
                <div>
                  <label>  <?php echo $examen_intra_arco; ?></label>
                </div>
              <div align="center"> Analisis del Paladar</div>
                <div>
                  <label>  <?php echo $analisis_paladar; ?></label>
                </div>


 
              


                  
                  </div>
                </div>



                </div>
              <?php } ?>
             
                 </div>
                </div>


              </div>
            </div>

              </div>
            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?><script type="text/javascript" src="prueba/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="prueba/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="prueba/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="prueba/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="prueba/files/assets/pages/waves/js/waves.min.js"></script>

<script type="text/javascript" src="prueba/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="text/javascript" src="prueba/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="prueba/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<script src="prueba/files/assets/js/pcoded.min.js"></script>
<script src="prueba/files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="prueba/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>


<script type="text/javascript" src="prueba/files/assets/js/script.js"></script>