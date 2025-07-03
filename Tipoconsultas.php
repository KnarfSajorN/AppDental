<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$valor =0;
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $tipoConsulta	= $_POST['tipoConsulta'];
   
 

echo '  
  <select name="Consulta_cod" id="Consulta_cod"  class="form-control select2" style="width: 100%;" required onChange="Cambio_Texto()">
      
<option selected="selected" value="">Seleccione... </option>';
               
                        $queryList=mysqli_query($conn3,"SELECT * FROM tipoConsulta where ID_Consulta= '$tipoConsulta' ");

                    
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                          $cod= $row_recordset32A['codigo'];
                                          $nombre= $row_recordset32A['nombre'];
                     
                                         
                                          echo "<option value='$cod'> $nombre </option>";
                                      }
$fecha_hoy = date("Y-m-d");
                   
echo '
               
              </select>  ';

if($tipoConsulta=='3')
{
  echo '<div class="panel box box-success">
  <div class="box-header with-border">
  <h4 class="box-title">
  <a data-toggle="collapse" data-parent="#examenFisico" href="#consultas_urgencias">
  Mas Informacion Para Consultas Medicas Por Urgencias
  </a>
  </h4>
  </div>
  <div id="consultas_urgencias" class="panel-collapse collapse">
  <div class="box-body">

  <div class="form-group col-md-12" align="left">
  <label>Fecha de ingreso del usuario en observación</label><br>
  <input type="date" name="fecha_ingreso_observacion" id="fecha_ingreso_observacion" class="form-control" max="'.$fecha_hoy.'" onChange="FechaUrgencia(this.value)"> 
  </div>

  <div class="form-group col-md-12" align="left">
  <label>Hora de ingreso del usuario a observación</label><br>
  <input type="time" name="hora_ingreso_observacion" id="hora_ingreso_observacion" class="form-control" value"00:00"> 
  </div>

  
  <div class="form-group col-md-12" align="left">
  <label>Destino del usuario a la salida de observación</label><br>
  <select name="destino_usuario_urgencias" id="destino_usuario_urgencias" class="form-control select2" style="width: 100%;">

                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option value="1">Alta de urgencias</option>
                <option value="2">Remisión a otro nivel de complejidad</option>
                <option value="3">Hospitalización</option>

               
              </select> 
  </div>

  <div class="form-group col-md-12" align="left">
  <label>Estado a la salida</label><br>
  <select name="estado_salida_urgencias" id="estado_salida_urgencias" class="form-control select2" style="width: 100%;" onChange="estado_salida(this.value);">

                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option value="1">Vivo (a)</option>
                <option value="2">Muerto (a)</option>
               
              </select> 
  </div>

  <div class="form-group col-md-12" align="left">
  <label>Causa básica de muerte en urgencias</label><br>
  <input type="text" name="causa_basica_urgencias" id="causa_basica_urgencias" class="form-control" maxlength="4" placeholder="Causa Basica" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
  </div>

  <div class="form-group col-md-12" align="left">
  <label>Fecha de la salida del usuario en observación</label><br>
  <input type="date" name="fecha_salida_urgencias" id="fecha_salida_urgencias" class="form-control"> 
  </div>

  <div class="form-group col-md-12" align="left">
  <label>Hora de la salida del usuario en observación</label><br>
  <input type="time" name="hora_salida_urgencias" id="hora_salida_urgencias" class="form-control"> 
  </div>



  </div>
  </div>
  </div>  ';
}


?>