<?php
 include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
 include("conexiones/conexion.php");



$para ="vacunvid@gmail.com";

                // título
                $titulo = 'Vacunas próximas agotar';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Vacunas próximas agotar.</title>
                    <body>

                    Buen día, los siguientes productos estan próximos agotarse: '; 


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

        $queryList=mysqli_query($conn3,"SELECT * FROM lotes where  cantidad = 10 or cantidad = 20 ");

     
   
        $nrowl=mysqli_num_rows($queryList);

           while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
          $idlotes             =$rowMotorizado['ID'];
          $cantidad            =$rowMotorizado['cantidad'];
          $descripcion           =$rowMotorizado['descripcion'];
          $vacuna          =$rowMotorizado['id_vacuna'];
        
$vacunas=funcionLotes($vacuna , 'id', 'Nombre', 'vacunas');

 
            $mensaje .=     '<div class="row">   
                  <div class="col-xs-6">' .$vacunas. '</div>
                  <div class="col-xs-3"> lote :'.$descripcion.' </div>
                  <div class="col-xs-3">'.$cantidad.' unidades disponibles </div>
                
                   
</div>
';

}



                $mensaje .='               <br></br>
                <p>Atentamente,<br />
                  Medicalsoft </p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From:  ALERTA VACUNAS <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 
      

mysqli_close($conn3);


 

?>