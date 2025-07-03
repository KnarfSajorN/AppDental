
<?php
include 'funciones/conn3.php';
include 'funciones/funciones.php';

session_start();

$cliente_id = $_GET['clienteId'];
$usuario_id = $_SESSION['ID'];

$ArregloDetalle = ["D1","D2","D3","D4","D5","D6","D7","D8","D9","D10"];

foreach ($ArregloDetalle as $key => $value) {
    
    $QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND Numero_Dedo = '$value' AND Activo = 1 ORDER BY id DESC  limit 1");

    while ($RowPodologiaDetalle = mysqli_fetch_array($QueryPodologia)) {

        $Procedimiento = $RowPodologiaDetalle["Procedimiento"];

        $SVG = funcionMaster(funcionMaster($Procedimiento, 'id', 'Icono', 'PD_Procedimiento'), 'id', 'SVG', 'PD_Iconos_SVG');
        $Color = funcionMaster($Procedimiento, 'id', 'Color', 'PD_Procedimiento');
        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

        $ArregloRespuesta[$value] = $SVG;
    }

}

$QueryCliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '$cliente_id' limit 1");
while ($RowCliente = mysqli_fetch_array($QueryCliente)) {
    $ArregloRespuesta["Nombre"] = $RowCliente["nombre_cliente"];
}

?>



<style>
        .contenedor {
            position: relative;
        }
        #D1 {
            position: absolute;
            left: 51px;
            top: 213px;
            width: 50px;
            height: 50px;
        }
        #D1:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D2 {
            position: absolute;
            left: 109px;
            top: 128px;
            width: 50px;
            height: 50px;
            
        }
        #D2:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D3 {
            position: absolute;
            left: 172px;
            top: 90px;
            width: 50px;
            height: 50px;
            
        }
        #D3:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D4 {
            position: absolute;
            left: 235px;
            top: 54px;
            width: 50px;
            height: 50px;
            
        }
        #D4:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D5 {
            position: absolute;
            left: 317px;
            top: 53px;
            width: 80px;
            height: 75px;
            
        }
        #D5:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
    </style>


<style>
        #D10 {
            position: absolute;
            left: 360px;
            top: 213px;
            width: 50px;
            height: 50px;
        }
        #D10:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D9 {
            position: absolute;
            left: 303px;
            top: 128px;
            width: 50px;
            height: 50px;
            
        }
        #D9:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D8 {
            position: absolute;
            left: 241px;
            top: 90px;
            width: 50px;
            height: 50px;
            
        }
        #D8:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D7 {
            position: absolute;
            left: 178px;
            top: 54px;
            width: 50px;
            height: 50px;
            
        }
        #D7:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D6 {
            position: absolute;
            left: 66px;
            top: 53px;
            width: 80px;
            height: 75px;
            
        }
        #D6:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
    </style>
    
<style>
    #D1 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D2 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }
    
    #D3 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D4 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D5 > svg {
        left: 5px;
        position: relative;
        height:4em;
        width:4em;
    }

    


    #D10 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D9 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }
    
    #D8 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D7 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D6 > svg {
        left: 5px;
        position: relative;
        height:4em;
        width:4em;
    }

</style>
<!DOCTYPE html>
<html>

<head>  
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

<div class="box">
                    <div class="box-body">
                        <div class='col-md-12 row'>
                            <div class="col-md-12" style="text-align: center;font-size: 25px;z-index: 1;">
                                Nombre: <?=$ArregloRespuesta["Nombre"]?>
                            </div>

                            <div id="contenedor1" class="contenedor col-md-6">
                                <div id="PieIzquierdo" style="width: 100%;font-size: 50px;position: absolute;left: 65px;">L</div>
                                <img src="PD_Imagenes/Pie Izquierdo.jpg" alt="Imagen">
                                <div id="D1" class="ClickPodologia" data-nombre="Quinto Dedo"><?=$ArregloRespuesta["D1"]?></div>
                                <div id="D2" class="ClickPodologia" data-nombre="Cuarto Dedo"><?=$ArregloRespuesta["D2"]?></div>
                                <div id="D3" class="ClickPodologia" data-nombre="Tercer Dedo"><?=$ArregloRespuesta["D3"]?></div>
                                <div id="D4" class="ClickPodologia" data-nombre="Segundo Dedo"><?=$ArregloRespuesta["D4"]?></div>
                                <div id="D5" class="ClickPodologia" data-nombre="Primer Dedo"><?=$ArregloRespuesta["D5"]?></div>
                            </div>

                            <div id="contenedor2" class="contenedor col-md-6" style="position: fixed;left: 650px;top: 35px;">
                                <div id="PieDerecho" style="width: 395px;font-size: 50px;position: absolute;text-align: end;">R</div>
                                <img src="PD_Imagenes/Pie Derecho.jpg" alt="Imagen">
                                <div id="D6" class="ClickPodologia" data-nombre="Primer Dedo"><?=$ArregloRespuesta["D6"]?></div>
                                <div id="D7" class="ClickPodologia" data-nombre="Segundo Dedo"><?=$ArregloRespuesta["D7"]?></div>
                                <div id="D8" class="ClickPodologia" data-nombre="Tercer Dedo"><?=$ArregloRespuesta["D8"]?></div>
                                <div id="D9" class="ClickPodologia" data-nombre="Cuarto Dedo"><?=$ArregloRespuesta["D9"]?></div>
                                <div id="D10" class="ClickPodologia" data-nombre="Quinto Dedo"><?=$ArregloRespuesta["D10"]?>    </div>
                            </div>

                        </div>
                    </div>
</div>
</body>
</html>
<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>