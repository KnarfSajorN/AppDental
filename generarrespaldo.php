<?php
 
header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
header('Content-Disposition: attachment; filename=basededatosclientes.xls');
 
include 'funciones/conn3.php';

$usuarioId = $_POST['usuarioId'];
   
echo '<table border="1" cellpadding="2" cellspacing="0" width="100%">
    <caption>base de datos de clientes</caption>
    <tr>
        <td>Paciente id</td>
        <td>nombre </td>
        <td>celular  </td>
        <td>ciudad  </td>
        <td>correo  </td> 
        <td>fecha registro </td>
        <td>fecha actualizado </td>
        <td>activo </td>
        <td>genero </td>
        <td>direccion  </td>
        <td>telefono  </td>
        <td>edad  </td>
        <td>Profesion  </td>
        <td>Acompañante Familiar </td>
        <td>Telefono acompañante </td>
        <td>Motivo consulta </td>
        <td>Antecedentes </td>
        <td>Entidad salud </td>
        <td>Seguro </td>
        <td>Nota </td>
        <td>Alergias </td>
        <td>Tipos sangre </td>
        <td>Es donante </td>
        <td>Toma medicamento </td>
        <td>Enfermedades de pequeño </td>
         
    </tr>';

 // and fechaAprobado BETWEEN '$desde' AND '$hasta'
        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id=$usuarioId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $cliente_id             =$rowMotorizado['CODI_CLIENTE'];
            $nombre_cliente         =$rowMotorizado['nombre_cliente'];
            $celular_cliente        =$rowMotorizado['celular_cliente'];
            $ciudad_cliente         =$rowMotorizado['ciudad_cliente'];
            $correo_cliente         =$rowMotorizado['correo_cliente'];
            $fechar                 =$rowMotorizado['fechar'];
            $fecha_actualizado      =$rowMotorizado['fecha_actualizado'];
            $activo                 =$rowMotorizado['activo'];
            $genero                 =$rowMotorizado['genero'];
            $direccion_cliente      =$rowMotorizado['direccion_cliente'];
            $telefono_cliente       =$rowMotorizado['telefono_cliente'];
            $edad_cliente           =$rowMotorizado['edad_cliente'];
            $profesion_cliente      =$rowMotorizado['profesion_cliente'];
            $acompananteFamiliar    =$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante   =$rowMotorizado['telefono_acompanante'];
            $motivoConsulta         =$rowMotorizado['motivoConsulta'];
            $antecedentes           =$rowMotorizado['antecedentes'];
            $entidadSalud           =$rowMotorizado['entidadSalud'];
            $seguro                 =$rowMotorizado['seguro'];
            $nota                   =$rowMotorizado['nota'];
            $alergias               =$rowMotorizado['alergias'];
            $tiposSangre            =$rowMotorizado['tiposSangre'];
            $esDonante              =$rowMotorizado['esDonante'];
            $tomaMedicamento        =$rowMotorizado['tomaMedicamento'];
            $enfermedadesPequeno    =$rowMotorizado['enfermedadesPequeno'];

		 
	 
echo "<tr>
        <td>$cliente_id</td>
        <td>$nombre_cliente</td>
        <td>$celular_cliente </td>
        <td>$ciudad_cliente </td>
        <td>$correo_cliente </td>
        <td>$fechar </td>
        <td>$fecha_actualizado </td>
        <td>$activo </td>
        <td>$genero </td>
        <td>$direccion_cliente </td>
        <td>$telefono_cliente </td>
        <td>$edad_cliente </td>
        <td>$profesion_cliente </td>
        <td>$acompananteFamiliar </td>
        <td>$telefono_acompanante </td>
        <td>$motivoConsulta </td>
        <td>$antecedentes </td>
        <td>$entidadSalud </td>
        <td>$seguro </td>
        <td>$nota </td>
        <td>$alergias </td>
        <td>$tiposSangre </td>
        <td>$esDonante </td>
        <td>$tomaMedicamento </td>
        <td>$enfermedadesPequeno </td>
        
        
    </tr>";
		 

	 

}

echo "</table>";
 
?>