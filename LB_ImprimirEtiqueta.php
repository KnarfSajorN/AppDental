<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Etiquetas</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="plugins/PrintCSSK/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="plugins/PrintCSSK/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A5
        }
    </style>

    <!-- Custom styles for this document -->

    <style>
        body {
            font-family: serif
        }

        h1 {
            font-family: 'Tangerine', cursive;
            font-size: 30pt;
            line-height: 18mm
        }

        h2,
        h3 {
            font-family: 'Tangerine', cursive;
            font-size: 24pt;
            line-height: 7mm
        }

        h4 {
            font-size: 22pt;
            line-height: 14mm
        }

        h2+p {
            font-size: 18pt;
            line-height: 7mm
        }

        h3+p {
            font-size: 14pt;
            line-height: 7mm
        }

        li {
            font-size: 11pt;
            line-height: 5mm
        }

        h1 {
            margin: 0
        }

        h1+ul {
            margin: 2mm 0 5mm
        }

        h2,
        h3 {
            margin: 0 3mm 3mm 0;
            float: left
        }

        h2+p,
        h3+p {
            margin: 0 0 3mm 50mm
        }

        h4 {
            margin: 2mm 0 0 50mm;
            border-bottom: 2px solid black
        }

        h4+ul {
            margin: 5mm 0 0 50mm
        }

        article {
            border: 4px double black;
            padding: 5mm 10mm;
            border-radius: 3mm
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<script type="text/javascript" src="plugins/JsBarCodeK/jsbarcode.js"></script>

<body class="A5">

        <?php
        include 'funciones/funciones.php';
        include 'funciones/funcionesUtilidades.php';
        $idOperacion = $_GET['idOperacion'];
        $DateAndTime = date('m-d-Y h:i:s a', time());
        $cliente_id = funcionMaster($idOperacion, 'idOperacion', 'idCliente', 'sOperacionInv');

        $resultado1 = mysqli_query($conn3, "SELECT * FROM  cliente  WHERE cliente_id = $cliente_id ");
        while ($rowCliente = mysqli_fetch_array($resultado1)) {
            $Nombrecliente = $rowCliente['nombre_cliente'];
            $Edad = calculaedad($rowCliente['fechaNacimiento']);

            $genero = $rowCliente['genero'];
            $CODI_CLIENTE = $rowCliente['CODI_CLIENTE'];

        }


        $resultado = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' AND Activo = 1 ORDER BY id ASC ");
        while ($oper = mysqli_fetch_array($resultado)) {
            $contador++;
            $c++;
            $id = $oper['id'];
            $examen_id = $oper['examen_id'];
            $Nombre = $oper['Nombre'];

            if($contador == 1)
            {
                echo "<section class='sheet padding-10mm' style='text-align-last: center;'>";

                if($c==1)
                {   
                    echo "<label style='display: grid;font-size: 12px;padding-top: 15mm;'> Orden # {$idOperacion} {$DateAndTime}</label>";
                    echo "<label style='display: grid;font-size: 12px;'> {$Nombrecliente} </label>";
                    echo "<label style='display: grid;font-size: 12px;'> Edad: {$Edad} Sexo: {$genero} ID: {$CODI_CLIENTE}</label>";
                }
                
                
            }
            if($contador!=4)
            {
                echo "<label style='display: grid;font-size: 12px;padding-top: 10mm;'> {$Nombrecliente} </label>";
                echo "<label style='display: grid;font-size: 12px;'> Edad: {$Edad} Sexo: {$genero} ID: {$CODI_CLIENTE}</label>";
                echo "<svg id='barcode_{$contador}'></svg><script>JsBarcode('#barcode_{$contador}', '{$idOperacion}-{$examen_id}', {height: 30,fontSize: 10});</script>";
                echo "<label style='display: grid;font-size: 10px;bottom: 10px;position: relative;'> {$Nombre} <br> {$DateAndTime} </label>";
            }
            if ($contador == 4) {
                echo "</section>";
                $contador=0;
            }
        }
        ?>

    </section>


</body>

</html>