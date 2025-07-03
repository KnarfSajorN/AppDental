<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");
 ?>

  
<?php

 $historiaClinica1 = $_GET['cliente'];
            $idr= $_GET['idr'];


 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['celular_cliente'];
            $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
            
            $email=$rowMotorizado['correo_cliente'];   
            $whatsapp = $rowMotorizado['whatsapp'];   
          }

$para ="$email";

                // título
                $titulo = 'Receta Medica';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Resultado de consulta en PIEL VITAL.</title>
                    <body> 
                    
                               Hola buen dia '.$nombre_cliente.', Como resultado de su consulta en PIEL VITAL, se le ha formulado los siguientes medicamentos :<br><br>';

 $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where   cliente_id = $historiaClinica1  and idReceta=$idr");

        
            $nrowl=mysqli_num_rows($querydeta);
            while($rowDetalle=mysqli_fetch_array($querydeta))
            {
               $ID                 = $rowDetalle['id'];                
                      $IDR                 = $rowDetalle['idReceta'];                
                     $Producto              = $rowDetalle['codigoProd'];
       
       
        $dosis                 = $rowDetalle['dosis'];
        $posologia                = $rowDetalle['posologia'];
        $frecuencia                 = $rowDetalle['frecuencia'];
         $administracion              = $rowDetalle['administracion'];
        $dosisdia           = $rowDetalle['dosisdia'];
        
       $via   = $rowDetalle['via'];
        $id_usuario              = $rowDetalle['usuario_id'];
        $id_cliente              = $rowDetalle['cliente_id']; 
        $total             = $rowDetalle['total']; 
        $dias             = $rowDetalle['dias']; 
        $nota            = $rowDetalle['nota']; 
       $producto1          = $rowDetalle['producto1'];  
        $Fecha          = $rowDetalle['fecha'];  
        $idReceta         = $rowDetalle['idReceta'];
        $cant        = $rowDetalle['cantidad'];
             
               $numero++;

            $mensaje .=     '<div class="row">   
                  <div class="col-xs-2">' .$cant. '</div>
                  <div class="col-xs-6">'.$Producto.$producto1.' </div>
                  
                  <div class="col-xs-4">'.$dosis.'  '.$posologia.' </div>
                   
</div>
               <div class="row">
               <div class="col-xs-3">
               <b>Dosis:</b>'.$dosis .' '.$posologia .'</div> <div class="col-xs-2"> <b>Cada:</b>'.$frecuencia.'  '.$administracion.' </div>  <div class="col-xs-2"><b>Durante:</b>'.$dias.' Dias </div> <div class="col-xs-2"><b>Vía:</b>'.$via.'</div><div class="col-xs-3"> </div> </div> 

<div class="row">
<div class="col-xs-12"><h4><i><b>Comentario:</b>'.$nota.'</i></h4></div></div>


<hr>
'

       ;  

} 

                $mensaje .='               <br></br>
                <p>Atentamente,<br />
                  ALTE-Asistente Medico VirtualMedic </p> 
                  
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
                $cabeceras .= 'From:  Resultado de consulta  con el Dr(a). '.$NOMBRE_USUARIO.'  <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 


$mensajeW = ' Receta de consulta en PIEL VITAL.
Hola buen dia '.$nombre_cliente.', Como resultado de su consulta en Asistente PIEL VITAL, se le ha formulado los siguientes medicamentos :
-
';

 $queryData=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $historiaClinica1  and idReceta=$idr");

        
            $nrowl=mysqli_num_rows($queryData);
            while($rowDetalleta=mysqli_fetch_array($queryData))
            {
               $Producto              = $rowDetalleta['codigoProd'];
               $uso             =$rowDetalleta['uso'];
         $prioridad       =$rowDetalleta['prioridad'];
       
        $dosis                 =$rowDetalleta['dosis'];
        $posologia                =$rowDetalleta['posologia'];
        $frecuencia                 =$rowDetalleta['frecuencia'];
         $administracion              = $rowDetalleta['administracion'];
        $dosisdia           =$rowDetalleta['dosisdia'];
       $via   =$rowDetalleta['via'];
        
        $total             =$rowDetalleta['total']; 
        $dias             =$rowDetalleta['dias']; 
        $nota            =$rowDetalleta['nota']; 
        $producto1          =$rowDetalleta['producto1']; 
             
              
 
$mensajeW .=
'Medicamento: '.$Producto.$producto1.' 
Dosis: '.$dosis.'
Posologia '.$posologia.' 
Dosis: '.$dosis .' '.$posologia .'
Cada: '.$frecuencia.' 
administracion: '.$administracion.' 
Durante: '.$dias. '  dias 
Vía: '.$via.'
Comentario: '.$nota.'
-
';  

} 



$accion = 0;
$historiaClinica1 = 0;
$usuario_id = 0;
 

echo $mensajeW;



Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $historiaClinica1, $usuario_id, $whatsapp, $accion);


                 echo "<script language='Javascript'> window.location='patientes';</script>"; 

              ?> 