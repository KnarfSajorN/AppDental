<?php 

try {
    require_once __DIR__ . "/../../funciones/conn3.php";
    require_once __DIR__ . "/../../funciones/funciones.php";
    
    switch ($_POST["type"]) {
        case 'obtener':
            $ID_principal = $_POST["ID_principal"];
            $Query = "SELECT CODI_CLIENTE, nombre_cliente, cliente_id FROM cliente WHERE ID_principal = $ID_principal AND activo = 1";
            $Result = mysqli_query($conn3, $Query);
            $data = [];
            if ($Result) {
                while ($row = mysqli_fetch_assoc($Result)) {
                    $data[] = $row;
                }
            }

            $Response = [
                "error" => null, 
                "data" => $data, 
            ];

            echo json_encode($Response);
            exit();

            break;
        
        default:
        
            $Response = [
                "error" => "Accion no espeficada", 
                "data" => null, 
            ];
        
            echo json_encode($Response);
            exit();
            break;
    }



} catch (\Throwable $th) {
    $Response = [
        "error" => $th->getMessage() . " " . $th->getLine(), 
        "data" => null, 
    ];

    echo json_encode($Response);
    exit();
}




