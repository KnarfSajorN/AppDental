<?php
include 'funciones/conn3.php';

/////////////////////////////////////////////////////////////////// creacion de la tabla para la validacion de los paquetes  //////////////////////////////////////////////////////////////////////////
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'HFC_ProductosPaquetesHistorias'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `HFC_ProductosPaquetesHistorias` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `idOperacion` INT(11) NULL DEFAULT '0' , 
        `detalle_id` INT(11) NULL DEFAULT '0' , 
        `Estado` INT(11) NULL DEFAULT '0' ,
        `Sesiones` INT(11) NULL DEFAULT '0' ,
        `SesionesRestantes` INT(11) NULL DEFAULT '0' ,
        `historia_id` INT(11) NULL DEFAULT '0',
        `cliente_id` INT(11) NULL DEFAULT '0',
        `usuario_id` INT(11) NULL DEFAULT '0',
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        //echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        //window.location='portada';</script>";

        //exit();
    }
}
/////////////////////////////////////////////////////////////////// creacion de la tabla para la validacion de los paquetes  //////////////////////////////////////////////////////////////////////////
?>

<style>
        * {
            padding: 0;
            margin: 0;
        }

        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            top: 140px;
            right: 0px;
            background-color: #3c8dbc;
            color: #FFF;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            border-radius: 10px 0px 0px 10px;
            z-index: 1000000;

            background: rgb(250, 235, 215);
            background: -moz-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
        }

        .float .my-float {
            margin-top: 17px;
        }
    </style>

<link rel='stylesheet' href='css/EstiloBoton.css'>
<link rel='stylesheet' href='css/accordionpaper.css'>

<!-- Button trigger modal -->

<a href="#" class="float" data-toggle="modal" data-target="#ModalPresupuesto">
    <i class="my-float fa-solid fa-book"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="ModalPresupuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Paquetes Facturados del Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style='height: 80vh;overflow: scroll;'>
                <div class="container-fluid" style='padding-right: 0px;padding-left: 0px;'>
                    <div class="">
                        <form id="FormularioPaquetesProcedimientos">
                            <div class='col-md-12'>
                                <div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
                                    <div class='panel panel-default'>
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  tipo = 1 AND idCliente = '$Cliente_FichaClinica' AND idEmpresa = '$Usuario_FichaClinica' order by idOperacion DESC");
                                        while ($rowPresupuesto = mysqli_fetch_array($queryList)) {
                                            $idOperacion = $rowPresupuesto['idOperacion'];
                                            $numeroDoc = $rowPresupuesto['numeroDoc'];
                                            $idCliente = $rowPresupuesto['idCliente'];
                                            $idEmpresa = $rowPresupuesto['idEmpresa'];
                                            $fechaOperacion = $rowPresupuesto['fechaOperacion'];

                                            $queryList1 = mysqli_query($conn3, "SELECT * FROM  cliente where  cliente_id = $idCliente");
                                            $rowCliente = mysqli_fetch_array($queryList1);

                                            $nombreCliente = $rowCliente['nombre_cliente'];

                                            $queryDetallePaqueteProductoContador = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion AND Tipo_Producto = 'Inventario_Paquete' order by id");
                                            $NrowProductoPaquete = mysqli_num_rows($queryDetallePaqueteProductoContador);

                                            if($NrowProductoPaquete>0){


                                                echo "<div class='panel-heading' role='tab' id='headingTwo' style='padding-bottom: 5px;'>
                                                            <h4 class='panel-title'>
                                                                <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#Factura{$idOperacion}' aria-expanded='false' aria-controls='collapse'>
                                                                <div class='row'>
                                                                    Paquetes Facturados| {$nombreCliente} | {$fechaOperacion} 
                                                                </div>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id='Factura{$idOperacion}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo' aria-expanded='false' style='height: 0px;margin-top: -5px;'>
                                                            <div class='panel-body holderpanel' style='text-align: initial;padding: 5px;'>
                                                                <div class='col-md-12'>";

                                                                            $queryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion AND Tipo_Producto = 'Inventario_Paquete' order by id");
                                                                            while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {
                                                                                $id = $rowDetalle['id'];
                                                                                $descripcion = ($rowDetalle['descripcion']);
                                                                                $cantidad = $rowDetalle['cantidad'];
                                                                                /////////////////////////////////////Crear el insert en la tabla de una vez para el apartado de las sesiones restantes
                                                                                $QuerySesiones = mysqli_query($conn3, "SELECT * FROM  HFC_ProductosPaquetesHistorias where detalle_id = $id and  idOperacion = $idOperacion");
                                                                                $NrowSesiones = mysqli_num_rows($QuerySesiones);
                                                                                if($NrowSesiones==0){

                                                                                    $consulta = mysqli_query($conn3, "INSERT INTO HFC_ProductosPaquetesHistorias 
                                                                                    (idOperacion, detalle_id, Estado, historia_id, cliente_id, usuario_id,Sesiones,SesionesRestantes) 
                                                                                    VALUES                     
                                                                                    ('$idOperacion', '$id', '0', '0', '$Cliente_FichaClinica', '$Usuario_FichaClinica','$cantidad','$cantidad');");

                                                                                }
                                                                                /////////////////////////////////////Crear el insert en la tabla de una vez para el apartado de las sesiones restantes



                                                                                $Procedimiento_Realizado="0";
                                                                                $QueryProcesadoProducto = mysqli_query($conn3, "SELECT * FROM  HFC_ProductosPaquetesHistorias where detalle_id = $id and  idOperacion = $idOperacion AND Estado='1' ");
                                                                                while ($RowProcesado = mysqli_fetch_array($QueryProcesadoProducto)) {
                                                                                    $Procedimiento_Realizado = $RowProcesado['id'];
                                                                                }
                                                                                echo "<div class='col-md-6'><b>{$descripcion}</b></div>";

                                                                                if($Procedimiento_Realizado=="0"){
                                                                                    echo "<div class='col-md-6 holder' id='div_procedimiento_{$id}' style='zoom: 0.5;padding-top: 15px;'>
                                                                                    <input id='check{$id}' class='checkmodal' name='ProductoPaquete[{$id}]' type='checkbox' value='Si'/>
                                                                                    <svg class='heart' style='top: -28px;position: relative;' xmlns='http://www.w3.org/2000/svg' width='48' height='48' fill='currentColor' class='bi bi-patch-check-fill' viewBox='0 0 16 16'> <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z'/> </svg>
                                                                                    <label for='check{$id}'><span>No Realizado</span><span>Realizado</span></label>
                                                                                </div>";
                                                                                }else{
                                                                                    echo "<div class='col-md-6'><label style='color:green;right: -45px;position: relative;'> Procedimiento Realizado </label> </div>";
                                                                                }
                                                                                

                                                                            }

                                                                            echo "</div>
                                                            </div>
                                                        </div>";
                                            }


                                        }
                                            
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="cliente_id" value="<?php echo $Cliente_FichaClinica ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $Usuario_FichaClinica ?>">

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="GuardarSeleccionProductos()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function GuardarSeleccionProductos(){
        var Data = $('#FormularioPaquetesProcedimientos').serialize();

        $.ajax({
            type: "POST",
            url: "HFC_Ajax.php",
            data: Data,
            success: function(response) {
                if(response!=""){
                    alert('Se guardaron los cambios');
                }
                
                
                $('#ModalPresupuesto').modal('hide');
                console.log(response);
                var Respuesta = JSON.parse(response);
                Respuesta.forEach(function(elemento) {

                        $('#div_procedimiento_' + elemento).html('<label style="color:green;right: -45px;position: relative;"> Procedimiento Realizado </label>');
                        $('#div_procedimiento_' + elemento).css('zoom', '1');
                });

                

            }
        });

    }
</script>


