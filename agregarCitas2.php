  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';


   $clienteId = $_GET['clienteId'];

   $IDconfig = $_SESSION['ID'];
      $queryListcalendario=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $IDconfig");

        $nrowl=mysqli_num_rows($queryListcalendario);

        while($rowcalendario=mysqli_fetch_array($queryListcalendario))

        {
 
           $tiempoConsulta=$rowcalendario['tiempoConsulta'];
            $cantidadPacientes=$rowcalendario['cantidadPacientes'];

            $lt=$rowcalendario['lt'];
            $mt=$rowcalendario['mt'];
            $et=$rowcalendario['et']; 
            $jt=$rowcalendario['jt'];
            $vt=$rowcalendario['vt'];
            $st=$rowcalendario['st'];
            $dt=$rowcalendario['dt'];

            $ld=$rowcalendario['ld'];
            $md=$rowcalendario['md'];
            $ed=$rowcalendario['ed'];
            $jd=$rowcalendario['jd'];
            $vd=$rowcalendario['vd'];
            $sd=$rowcalendario['sd'];
            $dd=$rowcalendario['dd'];

            $lh=$rowcalendario['lh'];
            $mh=$rowcalendario['mh'];
            $eh=$rowcalendario['eh'];
            $jh=$rowcalendario['jh'];
            $vh=$rowcalendario['vh'];
            $sh=$rowcalendario['sh'];
            $dh=$rowcalendario['dh'];

           }



   
if ($clienteId>0) {

include 'funciones/conn3.php';

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['whatsapp'];
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
            $antecedentes=$rowMotorizado['antecedentes'];

        }


//     $_SESSION['NOMBRE_USUARIO']

   


}



if ($clienteId == 0) 
{
   $celular_cliente = '593';
}  


 


if(isset($_GET['editar_cita']))
{
$editar_cita     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_cita'])));

      $queryList=mysqli_query($conn3,"SELECT * FROM  citas where idCitas = '$editar_cita'");
      $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $idCitas = $rowMotorizado['idCitas'];
            $nombre_cliente = $rowMotorizado['nombre'];
            $celular_cliente = $rowMotorizado['celular_cliente'];
            $celular_cliente = $rowMotorizado['telefono'];
            $correo_cliente = $rowMotorizado['correo'];
            $motivoConsulta = $rowMotorizado['motivoConsulta'];
            $Hora = $rowMotorizado['Hora'];
            $fecha = $rowMotorizado['fecha'];
          
        }



 
}


 
if ($fecha == '') {
  $fecha = date("Y-m-d");
}


if ($idCitas = '') {
  $idCitas = 0;
}



$msg = $_GET['msg'];

if ($msg == 1) 
{
$respuesta = ' 
          <div class="callout callout-info">
          <h4>Cita registrada</h4>
           <p></p>
        </div>';

}





      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Agregar cita</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Agregar cita</h4>
          <br>
           <form action="guardarCita.php" method="POST" name="formularioActualizarcliente">
            <div class="form-row">
  
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
       <div class="form-group col-md-4">

 
<select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required"  onChange="cargarFecha();" >
                    <option value="" selected></option> 
                    <?php
                      usuariosEspecialistasSelect();

                    ?>
                </select>




<!--
<select id="ID_select" onchange="javascript:location.href='miform.php?variable='+value;">


window.onload = function()
 {document.getElementById("ID_select").onchange = function()
 {location.href = "miform.php?variable="+value;}
 }

-->








              </div>
<style type="text/css">
  
#div-fecha
{
     display: none;
}

#div-Hora
{
     display: none;
}



</style>

          <div id="div-fecha" class="form-group col-md-8"> 
<!-- Fecha para verificar disponiblidad   -->            
    <input type="date" class="form-control input-lg" name="fecha"  id="fecha" min="<?php echo date('Y-m-d')?>" value="<?php echo $fecha?>"  onChange="verDia();"  required>
   





 <div id="div-results"></div>



          </div>

<!--
    <div id="div-Hora"  class="form-group col-md-4">
          
          
          </div> 
-->


          <?php if($_SESSION['TIPO']=='1'){?>




<?php } ?>
    

  <?php if($_SESSION['TIPO']=='0'){?>

       <div class="form-group col-md-6">

 
                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                    <option value="<?php echo $_SESSION['username']?>" selected="selected"> <?php echo $_SESSION['username']?></option>
               <!--     <?php
                      usuariosAselect($ID);

                    ?> -->
                </select>


              </div>



<?php } ?>
    






              <div class="form-group col-md-4"> 

                 <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre" value="<?php echo $nombre_cliente?>" required>
              </div>
             <div class="form-group col-md-4">
                <input type="number" class="form-control input-lg"  name="telefono" placeholder="+573206547898" value="<?php echo $celular_cliente?>" required>
              <font color="red" size="2">Para enviar la notificación de whatsapp debe de colocar el código país antes del numero +57</font>
              </div>
              <div class="form-group col-md-4">
                <input type="email" class="form-control input-lg"  name="correo" placeholder="Correo" value="<?php echo $correo_cliente?>">
                <font color="red" size="2">Para enviar la notificación al correo colocar el correo de los contrario no colocarlo </font>
              </div>
               
                <input type="text" class="form-control input-lg"   name="motivoConsulta" placeholder="Motivo consulta" value="<?php echo $motivoConsulta?>" required>
          
              <div align="center">
                
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" checked>
                 <i class="fa fa-user"></i>  Presencial  
                
                  <?php if ($clienteId > 0): ?>
                  <input type="radio" name="P" value="1"  class="flat-red" checked >
                 <i class="fa fa-video-camera"></i>   Virtual
                </label>
                <?php endif ?>
<?php if ($clienteId == ''): ?>
  <br>
             <i class="fa fa-video-camera"></i> 
             <a href="patientes">Para agendar citas virtuales debemos de seleccionar el paciente</a>
           
<?php endif ?>
                </label>
              </div>
                

<div align="center">
  

 <div id="div-resultsHora"></div>

</div>




              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input  type="hidden" name="idCitas"  value="<?php echo $_GET['editar_cita']?>">
              <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
              
            </div>

        
          </form>
        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Doctor</th>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo consulta</th>
 

                  
                  
                   <th class="text-center"> Tipo </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$doctor = $_SESSION['username']; 
              
// if ($_SESSION['TIPO'] == 0) {



                   $queryListA=mysqli_query($conn3,"SELECT * FROM  citas  where  estado  = 1  order by fecha asc");


/*

}
elseif($_SESSION['TIPO'] == 1) {
                   $queryListA=mysqli_query($conn3,"SELECT * FROM  citas  where usuario_id = $ID and estado  = 1 and  doctor = '$doctor'  order by fecha asc");

}

*/
                  //$queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $idCitas= $row_recordset32A['idCitas'];
                      $doctor= $row_recordset32A['doctor'];
                      $fecha= $row_recordset32A['fecha'];
                      $Hora= $row_recordset32A['Hora'];
                      $nombre= $row_recordset32A['nombre'];
                      $telefono= $row_recordset32A['telefono'];
                      $correo= $row_recordset32A['correo'];
                      $motivoConsulta= $row_recordset32A['motivoConsulta'];
                      $tipo= $row_recordset32A['tipo'];
                       
                       if ($tipo == 0) {
                         $tipoE = '<font color="blue"> <i class="fa fa-user" title="Presencial" name="Presencial"></i> </font>';
                       }
                       elseif ($tipo == 1) {
                         $tipoE = '<font color="#04CC05"> <i class="fa fa-video-camera" title="Virtual" name="Virtual"></i></font>';
                       }
                      echo '      
                      <tr>
                      <td width="20%"> <font color="#04CC05"> 
                      <a href="agregarCitas?editar_cita='.$idCitas.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a>';

if ($_SESSION['TIPO'] == 99) {
  echo '
                      <a href="masterEliminar.php?filtro='.$idCitas.'&tabla=citas&Columna=idCitas&origen=agregarCitas"> <font color = "red"> <i class="fa fa-trash" title="ELIMINAR" name="ELIMINAR"></i></font>  </a>';

}


                      echo '</font> '.funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios').'</td>
                      <td width="10%" class="text-center"> '.$fecha.'-'.$Hora.'</td>
                      <td width="15%" class="text-center"> '.$nombre.'</td>
                      <td width="15%" class="text-center">'.$telefono.'</td>
                      <td width="15%" class="text-center">'.$correo.'</td>
                      <td width="40%" class="text-center">
  <a href="masterEditor.php?filtro='.$idCitas.'&tabla=citas&Columna=idCitas&origen=agregarCitas&campoEditado='.$motivoConsulta.'&columnaEditado=motivoConsulta&idUsuario='.$ID.'"> <font color = "green"> <i class="fa fa-pencil" title="Editar Campo" name="Editar Campo"></i></font>  </a>
                      '.$motivoConsulta.'</td>
                      <td width="1%" class="text-center">'.$tipoE.' </td>
                  
                      </tr>';

                  }


 ?>


 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                     <th class="text-center">Doctor</th>
                    <th class="text-center">Fecha-Hora</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Motivo Consulta</th>
                  <th class="text-center"> Tipo </th>
                </tr>
                </tfoot>
              </table>
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
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>

 <!-- Funciona para consultar disponibilidad -->

 <script type="text/javascript">


      function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor},
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
        var doctor = $("#doctor").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };



function cargarFecha() {
  var x = document.getElementById('div-fecha');
      x.style.display = 'none';

  if (x.style.display === 'none') {
      x.style.display = 'block';
  } else {
  }

  var x2 = document.getElementById('div-Hora');
      x2.style.display = 'none';

  if (x2.style.display === 'none') {
      x2.style.display = 'block';
  } else {
  }




}


 
</script>