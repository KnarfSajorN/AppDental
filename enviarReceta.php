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
          }

$para ="$email";

                // título
                $titulo = 'Resultado de consulta en Gastro Center';

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Resultado de consulta con el Dr. Alejandro Orozco</title>
                    <body> 
                    
                               Hola buen dia '.$nombrecliente.', Como resultado de su consulta con  el Doctor Alejando Orozco, se le ha formulado los siguientes medicamentos :<br><br>';

 $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where   cliente_id = $historiaClinica1  and idReceta=$idr");

        
            $nrowl=mysqli_num_rows($querydeta);
            while($rowDetalle=mysqli_fetch_array($querydeta))
            {
               $Producto              =$rowDetalle['Producto'];
        $uso             =$rowDetalle['uso'];
         $prioridad       =$rowDetalle['prioridad'];
       
        $dosis                 =$rowDetalle['dosis'];
        $posologia                =$rowDetalle['posologia'];
        $frecuencia                 =$rowDetalle['frecuencia'];
         $administracion              =$rowDetalle['frecuencia2'];
        $dosisdia           =$rowDetalle['dosisdia'];
       $via   =$rowDetalle['via'];
        $id_usuario              =$rowDetalle['id_usuario'];
        $id_cliente              =$rowDetalle['idcliente']; 
        $total             =$rowDetalle['total']; 
        $dias             =$rowDetalle['dias']; 
        $nota            =$rowDetalle['nota']; 
        $producto1          =$rowDetalle['producto1']; 
             
               $numero++;

            $mensaje .=     '<div class="row">   
                  <div class="col-xs-2">' .$numero. '</div>
                  <div class="col-xs-6">'.$Producto.$producto1.' </div>
                  
                  <div class="col-xs-4">'.$dosis.'&nbsp&nbsp'.$posologia.' </div>
                   
</div>
               <div class="row">
               <div class="col-xs-3">
               <b>Dosis:</b>'.$dosis .' '.$posologia .'</div> <div class="col-xs-2"> <b>Cada:</b>'.$frecuencia.'&nbsp&nbsp'.$administracion.' </div>  <div class="col-xs-2"><b>Durante:</b>'.$dias.' Dias </div> <div class="col-xs-2"><b>Vía:</b>'.$via.'</div><div class="col-xs-3"> </div> </div> 

<div class="row">
<div class="col-xs-12"><h4><i><b>Comentario:</b>'.$nota.'</i></h4></div></div>


<hr>
'

       ;  

} 

 





                              
                $mensaje .='               <br></br>
                <p>Atentamente,<br />
                  ALTE-Dentalsoft</p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From:  Resultado de consulta  con el Dr(a). '.$NOMBRE_USUARIO.'  <noreply@dentalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras); 


                 echo "<script language='Javascript'> window.location='pacientesRecetario.php';</script>"; 

              ?> 