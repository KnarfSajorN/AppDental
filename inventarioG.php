<?php
    date_default_timezone_set('America/Bogota');
    include("funciones/funciones.php");
    include("funciones/conn3.php");
   
        $descripcion     = $_POST['descripcion'];  
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $referencia     = $_POST['referencia']; 
        $tipo     = $_POST['tipo']; 
        $existencia     = $_POST['existencia'];
        if($existencia==""){$existencia=0;} 
        $minimo     = $_POST['minimo'];
        if($minimo==""){$minimo=0;} 
        $maximo     = $_POST['maximo']; 
        if($maximo==""){$maximo=0;} 
        $costo     = $_POST['costo'];
        if($costo==""){$costo=0;} 
        $precio     = $_POST['precio']; 

        $puntos     = $_POST['puntos'];
        


        $ID              = $_POST['ID'];          
        $nota            = $_POST['nota'];          
        
        

        $fechar          = date("Y-m-d H:i:s");
        // if($fecha_vencimiento ==" "){
            

        // }else{$fecha_vencimiento=$fecha_vencimiento;}

        if($tipo == 19 or $tipo == 20){
            $fecha_nueva = date('Y-m-d'); 
            $nuevafecha = strtotime ('+10 year' , strtotime($fecha_nueva ));
            $fecha_vencimiento = date ('Y-m-d',$nuevafecha);
            $existencia =10000;
            $minimo =1;
            $maximo=10000;
            $costo=1;
        }else{
            $fecha_vencimiento  =$fecha_vencimiento ;
            $existencia =$existencia ;
            $minimo =$minimo ;
            $maximo =$maximo;
            $costo=$costo;
        }

mysqli_query($conn3,"INSERT INTO sinvetrios (descripcion, usuario_id, referencia, tipo, existencia, minimo, maximo, costo, precio, Fecha, nota,fecha_vencimiento, puntos) VALUES 
                                           ('$descripcion', '$ID', '$referencia', '$tipo', '$existencia', '$minimo', '$maximo', '$costo', '$precio','$fechar', '$nota','$fecha_vencimiento', '$puntos');") or die(mysqli_error($conn3));

 

echo "<script language='Javascript'> window.location='listaInventario.php?msg=1';</script>"; 

?>