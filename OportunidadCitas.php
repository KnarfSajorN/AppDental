  <!-- Left side column. contains the logo and sidebar -->
   <?php 
 date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");


   $clienteId = $_POST['idcliente'];

   $fecha = $_POST['fechaE'];
   $usuario = $_POST['usuario'];
   $grupo = $_POST['grupo'];

   $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

   $queryListC=mysqli_query($conn3,"SELECT * FROM  gruposAtencion where ID=$grupo");

            $nrowlC=mysqli_num_rows($queryListC);
            while($rowC=mysqli_fetch_array($queryListC))
            {

            
            $nombreGrupo   =$rowC['nombre'];
           

          } 



 
$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];



 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    ?>

  <!-- Content Wrapper. Contains page content -->

           <form action="guardarCitaOportunidad.php" method="POST" name="formularioActualizarcliente">
            <div class="form-row">
  

          </div>

           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Doctor</th>
                   
                    <th class="text-center">Especialidad</th>
                    <th class="text-center">Sucursal</th>
                     <th class="text-center">Fecha</th>
                     <th class="text-center">Motivo consulta</th>
                     <th class="text-center">Duración</th>

                      <th class="text-center">Hora</th>
                      <th class="text-center"> </th>
                      <th class="text-center"> </th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 
 if($grupo<>''){
   $queryList1=mysqli_query($conn3,"SELECT * FROM  config where (grupo1='$grupo' or grupo2='$grupo' or grupo3='$grupo') ");
 }
 else { $queryList1=mysqli_query($conn3,"SELECT * FROM  config  " );}
//echo "SELECT * FROM  config where (grupo1='$grupo' or grupo2='$grupo' or grupo3='$grupo') ";
  
            $nrowl=mysqli_num_rows($queryList1);
            while($row2=mysqli_fetch_array($queryList1))
            {

             $ID_Usuario      =$row2['ID_Usuario'];
            //$cantidadPacientes     =$row2['cantidadPacientes'];
            $tiempoConsulta          =$row2['tiempoConsulta'];
            $cantidadPacientes  =$row2['pacientes'];
             $sucur=$row2['sucursal'];
      
           

            $lt=$row2['lt'];
            $mt=$row2['mt'];
            $et=$row2['et'];
            $jt=$row2['jt'];
            $vt=$row2['vt'];
            $st=$row2['st'];
            $dt=$row2['dt'];





            $ld=$row2['ld'];
            $md=$row2['md'];
            $ed=$row2['ed'];
            $jd=$row2['jd'];
            $vd=$row2['vd'];
            $sd=$row2['sd'];
            $dd=$row2['dd'];

            $lh=$row2['lh'];
            $mh=$row2['mh'];
            $eh=$row2['eh'];
            $jh=$row2['jh'];
            $vh=$row2['vh'];
            $sh=$row2['sh'];
            $dh=$row2['dh'];



          $ldp=$row2['ldp'];
          $mdp=$row2['mdp'];
          $edp=$row2['edp'];
          $jdp=$row2['jdp'];
          $vdp=$row2['vdp'];
          $sdp=$row2['sdp'];
          $ddp=$row2['ddp'];

          $lhp=$row2['lhp'];
          $mhp=$row2['mhp'];
          $ehp=$row2['ehp'];
          $jhp=$row2['jhp'];
          $vhp=$row2['vhp'];
          $shp=$row2['shp'];
          $dhp=$row2['dhp'];

        $sul=$row2['sul'];
        $sum=$row2['sum'];
        $sue=$row2['sue'];
        $suj=$row2['suj'];
        $suv=$row2['suv'];
        $sus=$row2['sus'];
        $sud=$row2['sud'];



$queryListU=mysqli_query($conn3,"SELECT * FROM  usuarios where ID= $ID_Usuario");
//(echo "SELECT * FROM  usuarios where ID= $ID_Usuario";
        $nrowlU=mysqli_num_rows($queryListU);

        while($rowMotorizado=mysqli_fetch_array($queryListU))

        {
 
            $medico=$rowMotorizado['NOMBRE_USUARIO'];
            $especialidad=$rowMotorizado['especialidad'];
            $parte=$rowMotorizado['parte_cuerpo'];
            $sucur=$rowMotorizado['sucursal'];

             }
      
 
 $trabaja = 1;

 

if ($lt == 0 and $DiaSemana == 'Lunes') {
  $trabaja = 0;
 //echo "<font color = 'red'> <h4>El día lunes no esta permitido programar citas según configuración de horario, </h4></font> ";
}
elseif ($mt == 0 and $DiaSemana == 'Martes') {
  $trabaja = 0;

//echo "<font color = 'red'> <h4>El día Martes no esta permitido programar citas según configuración de horario</h4></font> ";
}
elseif ($et == 0 and $DiaSemana == 'Miercoles') {
  $trabaja = 0;

//echo "<font color = 'red'> <h4>El día Miercoles no esta permitido programar citas según configuración de horario</h4></font> ";
}
elseif ($jt == 0 and $DiaSemana == 'Jueves') {
  $trabaja = 0;

 //echo "<font color = 'red'> <h4>El día Jueves no esta permitido programar citas según configuración de horario</h4></font> ";
}
elseif ($vt == 0 and $DiaSemana == 'Viernes') {
  $trabaja = 0;

 //echo "<font color = 'red'> <h4>El día Viernes no esta permitido programar citas según configuración de horario</h4></font> ";
}
elseif ($st == 0 and $DiaSemana == 'Sabado') {
  $trabaja = 0;

//echo "<font color = 'red'> <h4>El día Sabado no esta permitido programar citas según configuración de horario</h4></font> ";
}
elseif ($dt == 0 and $DiaSemana == 'Domingo') {
  $trabaja = 0;

//echo "<font color = 'red'> <h4>El día Domingo no esta permitido programar citas según configuración de horario</h4></font> ";
}


if ($DiaSemana == 'Lunes') {$sucursal = $sul; $d = $ld; $h = $lh;$dp = $ldp; $hp = $lhp;}
elseif ($DiaSemana == 'Martes') {$sucursal = $sum; $d = $md; $h = $mh;$dp = $mdp; $hp = $mhp;}
elseif ($DiaSemana == 'Miercoles') {$sucursal = $sue; $d = $ed; $h = $eh;$dp = $edp; $hp = $ehp;}
elseif ($DiaSemana == 'Jueves') {$sucursal = $suj; $d = $jd; $h = $jh;$dp = $jdp; $hp = $jhp;}
elseif ($DiaSemana == 'Viernes') {$sucursal = $suv; $d = $vd; $h = $vh;$dp = $vdp; $hp = $vhp;}
elseif ($DiaSemana == 'Sabado') {$sucursal = $sus; $d = $sd; $h = $sh;$dp = $sdp; $hp = $shp;}
elseif ($DiaSemana == 'Domingo') {$sucursal = $sud; $d = $dd; $h = $dh;$dp = $ddp; $hp = $dhp;}



$hoy = date("Y-m-d");
$horaEsteMomento = date("H:i:s");

 

if ($tiempoConsulta==15 and $trabaja == 1) {
  


$queryList=mysqli_query($conn3,"SELECT * FROM  horario1 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')"); 





//echo "SELECT * FROM  horario1 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')";
      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                              $agendado = 0;


                              $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                       // echo      "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'";
                              $nrowl=mysqli_num_rows($queryAgenda);
                              while($row_agenda=mysqli_fetch_array($queryAgenda))
                              {
                                  $agendado    = $row_agenda['agendado'];

                              }

                              if ($agendado < $cantidadPacientes ) 
                              {  
$numero++;                                   
echo ' <tr><td> '.$medico.'</td>
<td>'.$especialidad.' '.$nombreGrupo.'</td>
<td>'.$sucur.'</td>
<td> '.$fecha.'</td>

<td>  <input type="text"   class="form-control input-lg" name="motivo" id="motivo'.$numero.'"> </td>
<!--<td> <a href="programarCita.php?clienteId='.$clienteId.'&fecha='.$fecha.'&doctor='.$ID_Usuario.'&Hora='.$horaM.'&usuario_id='.$usuario_id.'"><button type="button" name="'.$ID.'" value="'.$horaM.'" class="btn bg-olive btn-flat margin">'.$horaN.'</button></a></td>-->

 
              <input type="hidden" name="funciones" id="funciones"  value= "'.$numero.'">
              <input type="hidden" name="usuario_id" id="usuario_id'.$numero.'"  value= "'.$usuario.'">
              <input type="hidden" name="clienteId" id="clienteId'.$numero.'"  value="'.$clienteId.'">
              <input type="hidden" name="fecha" id="fecha'.$numero.'" value="'.$fecha.'">    
              <input type="hidden" name="Hora" id="Hora'.$numero.'" value="'.$horaM.'">
              <input type="hidden" name="doctor" id="doctor'.$numero.'"  value="'.$ID_Usuario.'">

<td> '.$horaN.'</td>
        <td> 
<a href="#"  onclick="agregarCita'.$numero.'();"> <font size="3">  <strong> Agendar</strong>  </font> </a>
             </td>



              <td>  <div class="form-group col-md-12" id="div-results'.$numero.'"></div> </td>





 ';

                              }

 
                    }


}



if ($tiempoConsulta==20 and $trabaja == 1) {
  


$queryList=mysqli_query($conn3,"SELECT * FROM  horario2 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')"); 





//echo "SELECT * FROM  horario1 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')";
      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                              $agendado = 0;


                              $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                       // echo      "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'";
                              $nrowl=mysqli_num_rows($queryAgenda);
                              while($row_agenda=mysqli_fetch_array($queryAgenda))
                              {
                                  $agendado    = $row_agenda['agendado'];

                              }

                              if ($agendado < $cantidadPacientes ) 
                              {  
$numero++;                                   
echo ' <tr><td> '.$medico.'</td>
<td>'.$especialidad.' '.$nombreGrupo.'</td>
<td>'.$sucur.'</td>
<td> '.$fecha.'</td>

<td>  <input type="text"   class="form-control input-lg" name="motivo" id="motivo'.$numero.'"> </td>
<!--<td> <a href="programarCita.php?clienteId='.$clienteId.'&fecha='.$fecha.'&doctor='.$ID_Usuario.'&Hora='.$horaM.'&usuario_id='.$usuario_id.'"><button type="button" name="'.$ID.'" value="'.$horaM.'" class="btn bg-olive btn-flat margin">'.$horaN.'</button></a></td>-->

 
              <input type="hidden" name="funciones" id="funciones"  value= "'.$numero.'">
              <input type="hidden" name="usuario_id" id="usuario_id'.$numero.'"  value= "'.$usuario.'">
              <input type="hidden" name="clienteId" id="clienteId'.$numero.'"  value="'.$clienteId.'">
              <input type="hidden" name="fecha" id="fecha'.$numero.'" value="'.$fecha.'">    
              <input type="hidden" name="Hora" id="Hora'.$numero.'" value="'.$horaM.'">
              <input type="hidden" name="doctor" id="doctor'.$numero.'"  value="'.$ID_Usuario.'">

<td> '.$horaN.'</td>
        <td> 
<a href="#"  onclick="agregarCita'.$numero.'();"> <font size="3">  <strong> Agendar</strong>  </font> </a>
             </td>



              <td>  <div class="form-group col-md-12" id="div-results'.$numero.'"></div> </td>





 ';

                              }

 
                    }


}



if ($tiempoConsulta==30 and $trabaja == 1) {
  


$queryList=mysqli_query($conn3,"SELECT * FROM  horario3 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')"); 





//echo "SELECT * FROM  horario1 where (horaM >= '$d' and horaM <= '$h') or (horaM >= '$dp' and horaM <= '$hp')";
      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                                          $horaM    = $row_recordset32['horaM'];
                                          $horaN   = $row_recordset32['horaN'];
                                         
                                          $ID              = $row_recordset32['id'];
                              $agendado = 0;


                              $queryAgenda=mysqli_query($conn3,"SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'");

                       // echo      "SELECT count(idCitas) as agendado FROM  citas  where doctor = '$ID_Usuario' and Hora = '$horaM' and fecha = '$fecha' and estado <= '3'";
                              $nrowl=mysqli_num_rows($queryAgenda);
                              while($row_agenda=mysqli_fetch_array($queryAgenda))
                              {
                                  $agendado    = $row_agenda['agendado'];

                              }

                              if ($agendado < $cantidadPacientes ) 
                              {  
$numero++;                                   
echo ' <tr><td> '.$medico.'</td>
<td>'.$especialidad.' '.$nombreGrupo.'</td>
<td>'.$sucur.'</td>
<td> '.$fecha.'</td>

<td>  <input type="text"   class="form-control input-lg" name="motivo" id="motivo'.$numero.'"> </td>
<!--<td> <a href="programarCita.php?clienteId='.$clienteId.'&fecha='.$fecha.'&doctor='.$ID_Usuario.'&Hora='.$horaM.'&usuario_id='.$usuario_id.'"><button type="button" name="'.$ID.'" value="'.$horaM.'" class="btn bg-olive btn-flat margin">'.$horaN.'</button></a></td>-->

 
              <input type="hidden" name="funciones" id="funciones"  value= "'.$numero.'">
              <input type="hidden" name="usuario_id" id="usuario_id'.$numero.'"  value= "'.$usuario.'">
              <input type="hidden" name="clienteId" id="clienteId'.$numero.'"  value="'.$clienteId.'">
              <input type="hidden" name="fecha" id="fecha'.$numero.'" value="'.$fecha.'">    
              <input type="hidden" name="Hora" id="Hora'.$numero.'" value="'.$horaM.'">
              <input type="hidden" name="doctor" id="doctor'.$numero.'"  value="'.$ID_Usuario.'">

<td> '.$horaN.'</td>
        <td> 
<a href="#"  onclick="agregarCita'.$numero.'();"> <font size="3">  <strong> Agendar</strong>  </font> </a>
             </td>



              <td>  <div class="form-group col-md-12" id="div-results'.$numero.'"></div> </td>





 ';

                              }

 
                    }


}


if ($tiempoConsulta==0 and $trabaja == 1) {
  


 
$numero++;                                   
echo ' <tr><td> '.$numero.'-'.$medico.'</td>
<td>'.$especialidad.' '.$nombreGrupo.'</td>
<td>'.$sucur.'</td>
<td> '.$fecha.'</td>
                                     


<td>     <select name="motivo" id="motivo'.$numero.'" class="form-control" data-placeholder="Seleccione" style="width:100%;color:black" onchange="color()"> ';
      
     
      $queryListA=mysqli_query($conn3,"SELECT * FROM  ConfigCitas WHERE usuario_id={$ID_Usuario}");
      $queryListA_num=mysqli_num_rows($queryListA);

      if($queryListA_num<>0){echo "<option value=''>Seleccione...</option>";}
      else{echo "<option value=''>No tiene motivos de consulta registrados, para registrarlos ir a icono en la parte superior </option> <script>document.getElementById('motivoConsulta').style.backgroundColor='red';</script>";}

      while($Row_Configcitas=mysqli_fetch_array($queryListA))
      {
        $id = $Row_Configcitas['id'];
        $nombre  = $Row_Configcitas['nombre'];
        $color  = $Row_Configcitas['color'];

        echo "<option value='{$id}&nbsp;|&nbsp;{$nombre}' style='background-color:{$color};'>{$nombre}</option>";
      }

      
 echo '   
      
    </select>


                                    <!-- <input type="text"   class="form-control input-lg" name="motivo" id="motivo'.$numero.'"> --></td>




               
   <td>           
                <select  id="duracion'.$numero.'" name="duracion" class="form-control input-lg select" style="width: 100%;">
                   
                  <option value=""> Duración de la cita</option>
                  <option> 20 minutos</option>
                  <option> 30 minutos</option>
                  <option>1 Hora </option>
                  <option> 1 Hora , 30 Min </option>
                  <option> 2 Horas</option>
                  <option> 2 Horas , 30 Min </option>
                  <option> 3 Horas</option>
                   
                </select>

         </td>







<!--<td> <a href="programarCita.php?clienteId='.$clienteId.'&fecha='.$fecha.'&doctor='.$ID_Usuario.'&Hora='.$horaM.'&usuario_id='.$usuario_id.'"><button type="button" name="'.$ID.'" value="'.$horaM.'" class="btn bg-olive btn-flat margin">'.$horaN.'</button></a></td>-->

 
              <input type="hidden" name="funciones" id="funciones"  value= "'.$numero.'">
              <input type="hidden" name="usuario_id" id="usuario_id'.$numero.'"  value= "'.$usuario.'">
            
              <input type="hidden" name="fecha" id="fecha'.$numero.'" value="'.$fecha.'">    
              <input type="hidden" name="clienteId" id="clienteId'.$numero.'"  value="'.$clienteId.'">

             
              <input type="hidden" name="doctor" id="doctor'.$numero.'"  value="'.$ID_Usuario.'">
              <input type="hidden" name="numero" id="numero'.$numero.'"  value="'.$numero.'">

<td> <input type="time" class="form-control input-lg"  name="Hora" id="Hora'.$numero.'"  onChange="verHora'.$numero.'();" value="'.$Hora.'" ></td>
        <td> 

<div class="form-group col-md-12" align="center">
  

 <div id="div-resultsHora'.$numero.'"></div>

</div>


<!--

<a href="#"  onclick="agregarCita'.$numero.'();"> <font size="3">  <strong> Agendar</strong>  </font> </a> -->
             </td>



              <td>  <div class="form-group col-md-12" id="div-results'.$numero.'"></div> </td>






 ';



}




}





mssql_close($dbhandle);
 ?>

</form> 
 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                     <th class="text-center">Doctor</th>
                    <th class="text-center">Especialidad</th>
                    <th class="text-center">Sucursal</th>
                     <th class="text-center">Fecha</th>
                      <th class="text-center">Hora</th>
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





 <script type="text/javascript">


   function agregarCita1(){
// estas son las variables que enviamos

        var fecha = $("#fecha1").val();
        var Hora = $("#Hora1").val();
        var usuario_id = $("#usuario_id1").val();
        var doctor = $("#doctor1").val();
        var clienteId = $("#clienteId1").val();
        var motivo = $("#motivo1").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results1').html(response);
                 
            }
        });
    };


 function agregarCita2(){
// estas son las variables que enviamos

        var fecha = $("#fecha2").val();
        var Hora = $("#Hora2").val();
        var usuario_id = $("#usuario_id2").val();
        var doctor = $("#doctor2").val();
        var clienteId = $("#clienteId2").val();
        var motivo = $("#motivo2").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results2').html(response);
                 
            }
        });
    };




</script>

  
 <!-- Funciona para consultar disponibilidad -->

