<?php
include'funciones/funciones.php';

$cliente_id = $_GET['clienteId'];

$usuario_id = $_GET['usuarioId'];

$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$cliente_id");
while($rowMotorizado=mysqli_fetch_array($queryList)){

    $Cliente_Nombre=$rowMotorizado['nombre_cliente'];
    $Cliente_Documento=$rowMotorizado['CODI_CLIENTE'];
    $Cliente_Correo=$rowMotorizado['correo_cliente'];
    $Cliente_Whatsapp=$rowMotorizado['whatsapp'];
}


function funcionMasterAntiguo($filtro, $campoFiltrar, $campoImprimir, $tabla)
 {
 	include 'funciones/conn3.php';
 	$query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");

 	$nrowl = mysqli_num_rows($query);
 	while ($row = mysqli_fetch_array($query)) {

 		$text = $row[$campoImprimir];
 	}

     return  $text;
}

$ArregloDientes[0]=["18","17","16","15","14","13","12","11","21","22","23","24","25","26","27","28"];
$ArregloDientes[1]=["Vacio","55","54","53","52","51","61","62","63","64","65","Vacio"];

$ArregloDientes[2]=["Vacio","85","84","83","82","81","71","72","73","74","75","Vacio"];
$ArregloDientes[3]=["48","47","46","45","44","43","42","41","31","32","33","34","35","36","37","38"];


echo "<table style='width:100%;border: 5px solid #3c8dbc;border-radius: 15px;'>";
echo "<tr><td colspan='16' class='td_pacientes' style='font-size: 22px;'> <div style='width:25%;float: left;'> Nombres : $Cliente_Nombre </div><div style='width:25%;float: left;'> Documento : $Cliente_Documento </div><div style='width:25%;float: left;'> Correo : $Cliente_Correo </div><div style='width:25%;float: left;'> Whatsapp : $Cliente_Whatsapp </div> </td></tr>";
foreach ($ArregloDientes as $keyDiente => $valueDiente) {
    $Contador++;
    $EstiloTR="";
    if($Contador=="2" OR $Contador=="3"){
        $EstiloTR="left: 50px;position: relative;";
    }
    echo "<tr style='display: block;height: 280px;width: 100%;{$EstiloTR}'>";

    foreach ($valueDiente as $keyPieza => $valuePieza) {

        $Procedimiento="";
        if($valuePieza!="Vacio"){

            $ClaseInicial="";
            switch ($valuePieza) {
                case "18":case"48":
                    $ClaseInicial="DienteInicial";
                break;

                case "55":case"85":
                    $ClaseInicial="DienteInicial1";
                break;

            }
            echo"<td class='Grupo_{$Contador} {$ClaseInicial}' style='padding-left:30px'> <label style='position: relative;left: 10px;'>{$valuePieza}</label>";
            echo"<div style='display: table-caption;padding-right: 20px;'>";
            echo "<img src='OD_ImagenOdontograma/{$valuePieza}.png' style='position: inherit;'><br>";
            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Diente='$valuePieza' ORDER BY id DESC LIMIT 1 ");
            while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {
                $Procedimiento = $RowOdontogramaMaster["Procedimiento"];
            }

            $SVG = funcionMasterAntiguo(funcionMasterAntiguo($Procedimiento,'id','Icono','OD_Procedimiento'),'id','SVG','OD_Iconos_SVG');
            $Color = funcionMasterAntiguo($Procedimiento,'id','Color','OD_Procedimiento');
            $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);

            if($Procedimiento=="17"){

                $SVG = '<svg  viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="width: 2em;left: 1px;height: 22px;">
                <rect y="200" width="1155.317" height="100" style="stroke-width: 40px; stroke: rgb(0, 42, 255); fill: rgba(255, 255, 255, 0);" x="-285.379"/>
                </svg>
                ';
                echo $SVG."<br>";
            }elseif($Procedimiento=="18"){

                $SVG= '<svg id="Especial" viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="width: 2em;left: 1px;height: 22px;top: -88px;">
                <path style="fill: rgb(216, 216, 216); stroke-width: 40px; stroke: rgb(0, 34, 255);" d="M -400 250.518 L 1000 250.518"/>
                </svg>
                <svg  viewBox="0 0 500 500" width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="width: 2em;left: 1px;height: 22px;top: -30px;">
                <path style="fill: rgb(216, 216, 216); stroke-width: 40px; stroke: rgb(0, 34, 255);" d="M -400 250.518 L 1000 250.518"/>
                </svg>
                ';
            
                echo $SVG."<br>";
            }else{
                echo $SVG."<br>";
            }
            


            $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMaster WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' LIMIT 1");
            while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

                $ArregloD = $RowOdontogramaMaster["d$valuePieza"];

                foreach (json_decode($ArregloD) as $key => $value) {
                            
                    $SVG = funcionMasterAntiguo(funcionMasterAntiguo($value,'id','Icono','OD_Procedimiento'),'id','SVG','OD_Iconos_SVG');
                    $Color = funcionMasterAntiguo($value,'id','Color','OD_Procedimiento');
                    $SVG = str_replace('fill="currentColor"', "fill='{$Color}'", $SVG);

                    switch ($key) {
                        case '0':
                            echo "<div style='height:30px;width:30px;'>".$SVG."</div>";
                            break;
                        case '1':
                            echo "<div style='height:30px;width:30px;left: -33px;position: relative;'>".$SVG."</div>";
                            break;
                        case '2':
                            echo "<div style='height:30px;width:30px;position: relative;top: 5px;'>".$SVG."</div>";
                            break;
                        case '3':
                            echo "<div style='height: 30px;width: 30px;left: 33px;top: -59px;position: relative;'>".$SVG."</div>";
                            break;
                        case '4':
                            echo "<div style='height:30px;width:30px;position: relative;top: -87px;'>".$SVG."</div>";
                            break;
                        case '5':
                            echo "<div style='height:30px;width:30px;position: relative;top: -182px;'>".$SVG."</div>";
                            break;
                        case '6':
                            echo "<div style='height:30px;width:30px;position: relative;top: -80px;'>".$SVG."</div>";
                            break;
                    }
                    
                }

            }
            echo "</div>";
            echo "</td>";


        }else{
            echo"<td></td><td></td><td></td>";
        } 
        
    }
    echo "</tr>";
}
echo "</table>";


?>
<style>
    .Grupo_1 > div > SVG{
        position: relative;
        top: -40px;
        left:3px;
        transform: rotate(180deg);  
    }

    .Grupo_2> div > SVG{
        position: relative;
        top: -73px;
        left: 13px!important;
        transform: rotate(180deg);
        zoom: 0.6; 
    }

    .Grupo_2> div > #Especial{
        top: -120px!important;
    }

    .Grupo_3 > div > SVG{
        position: relative;
        top: -91px;
        left: 13px!important;
        zoom: 0.6;  
    }

    .Grupo_3> div > #Especial{
        top: -120px!important;
    }


    .Grupo_4 > div > SVG{
        position: relative;
        top: -62px;
        left: 3px; 
    }

    @page {
        orientation: landscape;
        size: 1100px 800px;
        margin: 0;
    }

    @media print {
        table{
            zoom: 0.6;
        }
    }

.td_pacientes{
    border: 5px solid #3c8dbc;
    border-radius: 15px;
    position: relative;
    padding: 15px;
}

.Grupo_1, .Grupo_4{
    width: 6.7%;
    left: -7px;
    position: relative;
}

.Grupo_2, .Grupo_3{
    width: 10%;
    left: -7px;
    position: relative;
    padding-left: 35px;
}

.DienteInicial{
    left: 0px!important;
}

.DienteInicial1{
    left: 5px!important;
}
</style>
<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>