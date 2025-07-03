<meta charset="utf-8"><?php
 
header('Content-type: application/vnd.ms-excel; charset="utf-8"');
header('Content-Disposition: attachment; filename=basededatosconsultas.xls');
include 'funciones/conn3.php';
 
include 'funciones/conn3.php';

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

   

 echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
   
    <tr>
        
        <td>Tipo de identificación </td>
        <td>Número de identificación </td>
        <td>Código entidad administradora </td>
        <td>Tipo de usuario </td>
        <td>Apellidos del Usuario </td>
        <td>Nombres del Usuario </td>
        <td>Edad </td>
        <td>Unidad medida de edad </td>
        <td>Sexo </td>
        <td>Código del departamento de residencia habitual</td>
        <td>Código de municipios de residencia habitual</td>
        <td>Zona Residencia </td>
        
        
    </tr>';

 // and fechaAprobado BETWEEN '$desde' AND '$hasta'
        

        $queryListc=mysqli_query($conn3,"SELECT * FROM  cliente ");
        $nrowl=mysqli_num_rows($queryListc);
        while($rowc=mysqli_fetch_array($queryListc))
        {
            $nombre_cliente     =$rowc['nombre_cliente'];
            $CODI_CLIENTE       =$rowc['CODI_CLIENTE'];
            $ciudad_cliente       =$rowc['ciudad_cliente'];
            $tipo_cliente       =$rowc['tipo_cliente'];
            $genero       =$rowc['genero'];
            $direccion_cliente       =$rowc['direccion_cliente'];
            $edad_cliente       =$rowc['edad_cliente'];
            $profesion_cliente       =$rowc['profesion_cliente'];
            $acompananteFamiliar       =$rowc['acompananteFamiliar'];
            $parentesco_acompanante       =$rowc['parentesco_acompanante'];
            $entidadSalud       =$rowc['entidadSalud'];
            $seguro       =$rowc['seguro'];
            $fechaNacimiento       =$rowc['fechaNacimiento'];
            $tipoUsuario       =$rowc['tipoUsuario'];
            $entidad      =$rowc['cod_entidad'];
            $municipio      =$rowc['cod_municipio'];
            $dpto      =$rowc['cod_dpto'];
            $nombre     =$rowc['nombre'];
            $apellido    =$rowc['apellido'];
            $zona   =$rowc['zona'];
            

  $edad= calculaedad($fechaNacimiento);
            
               $date=date_create($Fecha);
$date = date_format($date,"d/m/Y");

      

         
     
echo "<tr>
        

        <td>$tipo_cliente </td>
        <td>$CODI_CLIENTE  </td>
        <td>$entidad</td>
        <td> $tipoUsuario    </td>
        <td>$apellido </td>
        <td>$nombre </td>
        <td>$edad</td>
        <td>1 </td>
        <td>$genero </td>
        <td> $dpto </td>
        <td> $municipio </td>
        <td>$zona </td>
        
    </tr>";
         

     

}

echo "</table>";
 
?>