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

  <a class="btn btn-primary" href="pacientes_Odonto.php" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
  <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>
                                       
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#odonto" data-toggle="tab">Odontograma</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">


















          <div class="active tab-pane" id="odonto">
          
          
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
            






<?php
 


 

?>


<table border="1" class="tg" width="100%">
  <tr>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=18'><img src='oG$d18/18.png' title='$n18'></a>";?> <br> 18 </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=17'><img src='oG$d17/17.png' title='$n17'></a>";?><br> 17  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=16'><img src='oG$d16/16.png' title='$n16'></a>";?><br> 16  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=15'><img src='oG$d15/15.png' title='$n15'></a>";?><br> 15  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=14'><img src='oG$d14/14.png' title='$n14'></a>";?><br> 14  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=13'><img src='oG$d13/13.png' title='$n13'></a>";?><br> 13  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=12'><img src='oG$d12/12.png' title='$n12'></a>";?><br> 12  </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=11'><img src='oG$d11/11.png' title='$n11'></a>";?><br> 11  </th>
     
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=21'><img src='oG$d21/21.png' title='$n21'></a>";?> <br> 21    </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=22'><img src='oG$d22/22.png' title='$n22'></a>";?> <br> 22    </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=23'><img src='oG$d23/23.png' title='$n23'></a>";?> <br> 23    </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=24'><img src='oG$d24/24.png' title='$n24'></a>";?> <br> 24   </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=25'><img src='oG$d25/25.png' title='$n25'></a>";?> <br> 25   </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=26'><img src='oG$d26/26.png' title='$n26'></a>";?> <br> 26   </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=27'><img src='oG$d27/27.png' title='$n27'></a>";?> <br> 27   </th>
    <th align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=28'><img src='oG$d28/28.png' title='$n28'></a>";?> <br> 28 </th>
    
  </tr>
  <tr>
    <td colspan="3" rowspan="2"></td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=55'><img src='oG$d55/55.png' title='$n55'></a>";?><br> 55 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=54'><img src='oG$d54/54.png' title='$n54'></a>";?><br> 54 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=53'><img src='oG$d53/53.png' title='$n53'></a>";?><br> 53 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=52'><img src='oG$d52/52.png' title='$n52'></a>";?><br> 52 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=51'><img src='oG$d51/51.png' title='$n51'></a>";?><br> 51 </td>
    
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=61'><img src='oG$d65/61.png' title='$n61'></a>";?><br> 61 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=62'><img src='oG$d64/62.png' title='$n62'></a>";?><br> 62 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=63'><img src='oG$d63/63.png' title='$n63'></a>";?><br> 63 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=64'><img src='oG$d62/64.png' title='$n64'></a>";?><br> 64 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=65'><img src='oG$d61/65.png' title='$n65'></a>";?><br> 65 </td>
    
    <td colspan="3" rowspan="2"></td>
  </tr>
  <tr>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=85'><img src='oG$d85/85.png' title='$n85'></a>";?><br> 85 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=84'><img src='oG$d84/84.png' title='$n84'></a>";?><br> 84 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=83'><img src='oG$d83/83.png' title='$n83'></a>";?><br> 83 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=82'><img src='oG$d82/82.png' title='$n82'></a>";?><br> 82 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=81'><img src='oG$d81/81.png' title='$n81'></a>";?><br> 81 </td>
    
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=71'><img src='oG$d75/71.png' title='$n71'></a>";?><br> 71 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=72'><img src='oG$d74/72.png' title='$n72'></a>";?><br> 72 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=73'><img src='oG$d73/73.png' title='$n73'></a>";?><br> 73 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=74'><img src='oG$d72/74.png' title='$n74'></a>";?><br> 74 </td>
    <td align="center"><?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=75'><img src='oG$d71/75.png' title='$n75'></a>";?><br> 75 </td>
  </tr>
  <tr>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=48'><img src='oG$d48/48.png' title='$n48'></a>";?> <br> 48   </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=47'><img src='oG$d47/47.png' title='$n47'></a>";?><br> 47  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=46'><img src='oG$d46/46.png' title='$n46'></a>";?><br> 46  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=45'><img src='oG$d45/45.png' title='$n45'></a>";?><br> 45  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=44'><img src='oG$d44/44.png' title='$n44'></a>";?><br> 44  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=43'><img src='oG$d43/43.png' title='$n43'></a>";?><br> 43  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=42'><img src='oG$d42/42.png' title='$n42'></a>";?><br> 42  </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=41'><img src='oG$d41/41.png' title='$n41'></a>";?><br> 41  </td>
     
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=31'><img src='oG$d31/31.png' title='$n31'></a>";?> <br> 31    </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=32'><img src='oG$d32/32.png' title='$n32'></a>";?> <br> 32    </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=33'><img src='oG$d33/33.png' title='$n33'></a>";?> <br> 33    </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=34'><img src='oG$d34/34.png' title='$n34'></a>";?> <br> 34   </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=35'><img src='oG$d35/35.png' title='$n35'></a>";?> <br> 35   </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=36'><img src='oG$d36/36.png' title='$n36'></a>";?> <br> 36   </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=37'><img src='oG$d37/37.png' title='$n37'></a>";?> <br> 37   </td>
    <td align="center"> <?php echo "<a href='historiaClinica_odonto?cliente_odonto_id=$cliente_odonto_id&pzs=38'><img src='oG$d38/38.png' title='$n38'></a>";?> <br> 38   </td>
    

  </tr>
</table>



































                  </div>
                </div>

 


                










 

              </div>
            </div>
            <!-- /.box-body -->
     




























































 
      

              </div>
            
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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

   ?>