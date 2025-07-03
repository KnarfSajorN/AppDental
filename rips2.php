<?php
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=basededatoshistorias.xls');
$host='localhost';
$userdb='dentalro_dental';
$pass2='7){UNfRj(evG';
$DB='dentalro_co272';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
   
    <tr>
        
       
        
    </tr>';

 // and fechaAprobado BETWEEN '$desde' AND '$hasta'
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
        $queryList=mysqli_query($conn3,"SELECT * FROM  historiaclinica_odonto  where Fecha BETWEEN '$desde' and '$hasta'");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $cliente_id=$rowMotorizado['cliente_id'];
            $Fecha=$rowMotorizado['Fecha'];
            $Hora=$rowMotorizado['Hora'];
            $motivoConsulta=$rowMotorizado['motivoConsulta'];
            $diagnostico=$rowMotorizado['diagnostico'];
            $tratamiento=$rowMotorizado['tratamiento'];
            $cie10=$rowMotorizado['cie10'];
            $prestaciones=$rowMotorizado['prestaciones'];
            $rSistema=$rowMotorizado['rSistema'];
            $enfermedadActual=$rowMotorizado['enfermedadActual'];
            $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
            $diagnosticoMsalud=$rowMotorizado['diagnosticoMsalud'];
          






        $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente_odonto where fechar BETWEEN '$desde' and '$hasta'");
        $nrowl=mysqli_num_rows($queryListc);
        while($rowc=mysqli_fetch_array($queryListc))
        {
            $nombre_cliente     =$rowc['nombre_cliente_odonto'];
            $CODI_CLIENTE       =$rowc['CODI_cliente_odonto'];
            $ciudad_cliente       =$rowc['ciudad_cliente_odonto'];
            $tipo_cliente       =$rowc['tipo_cliente_odonto'];
            $genero       =$rowc['genero'];
            $direccion_cliente       =$rowc['direccion_cliente_odonto'];
            $edad_cliente       =$rowc['edad_cliente_odonto'];
            $profesion_cliente       =$rowc['profesion_cliente_odonto'];
            $acompananteFamiliar       =$rowc['acompananteFamiliar'];
            $parentesco_acompanante       =$rowc['parentesco_acompanante'];
            $entidadSalud       =$rowc['entidadSalud'];
            $seguro       =$rowc['seguro'];
            $fechaNacimiento       =$rowc['fechaNacimiento'];
            $tipoUsuario       =$rowc['tipoUsuario'];

 
        }     
            
        $date=date_create($Fecha);
$date = date_format($date,"d/m/Y");

         
     
echo "<tr>
        

        <td>;;$tipo_cliente;$CODI_CLIENTE;$date;;;;$motivoConsulta;; $cie10 ;;$prestaciones;; </td>
 
    </tr>";
         

     

}

echo "</table>";
 date_format()
?>