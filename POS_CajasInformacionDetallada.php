<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

///////////////////////////////////////////////////////////////////////////

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}


 .header {
	 padding: 30px 30px 0;
	 text-align: center;
}
 .header__title {
	 margin: 0;
	 font-size: 2.5em;
	 font-weight: 500;
	 line-height: 1.1;
}
 .header__subtitle {
	 margin: 0;
	 font-size: 1.5em;
	 color: #949fb0;
	 font-family: 'Yesteryear', cursive;
	 font-weight: 500;
	 line-height: 1.1;
}
 .cards {
	 padding: 15px;
	 display: flex;
	 flex-flow: row wrap;
}
 .card {
	 margin: 15px;
	 width: calc((100% / 3) - 30px);
	 transition: all 0.2s ease-in-out;
}
 @media screen and (max-width: 991px) {
	 .card {
		 width: calc((100% / 2) - 30px);
	}
}
 @media screen and (max-width: 767px) {
	 .card {
		 width: 100%;
	}
}
 .card:hover .card__inner {
	 background-color: #59b7ef;
	 transform: scale(1.05);
}
 .card__inner {
	 width: 100%;
	 padding: 30px;
	 position: relative;
	 cursor: pointer;
	 background-color: #949fb0;
	 color: #eceef1;
	 font-size: 1.5em;
	 text-align: center;
	 transition: all 0.2s ease-in-out;
}
 .card__inner:after {
	 transition: all 0.3s ease-in-out;
}
 .card__inner .fa {
	 width: 100%;
	 margin-top: 0.25em;
}
 .card__expander {
    transition: all 0.2s ease-in-out;
    background-color: #deedf6;
    width: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #000000;
    font-size: 1.5em;
    border-color: black;
    border: 2px solid black;
    border-radius: 20px;
}
 .card__expander .fa {
	 font-size: 1.75em;
	 position: absolute;
	 top: 10px;
	 right: 10px;
	 cursor: pointer;
}
 .card__expander .fa:hover {
	 opacity: 0.9;
}
 .card.is-collapsed .card__inner:after {
	 content: "";
	 opacity: 0;
}
 .card.is-collapsed .card__expander {
	 max-height: 0;
	 min-height: 0;
	 overflow: hidden;
	 margin-top: 0;
	 opacity: 0;
}
 .card.is-expanded .card__inner {
	 background-color: #59b7ef;
}
 .card.is-expanded .card__inner:after {
	 content: "";
	 opacity: 1;
	 display: block;
	 height: 0;
	 width: 0;
	 position: absolute;
	 bottom: -30px;
	 left: calc(50% - 15px);
	 border-left: 15px solid transparent;
	 border-right: 15px solid transparent;
	 border-bottom: 15px solid #333a45;
}
 .card.is-expanded .card__inner .fa:before {
	 content: "\f115";
}
 .card.is-expanded .card__expander {
	 max-height: 1000px;
	 min-height: 200px;
	 overflow: visible;
	 margin-top: 30px;
	 opacity: 1;
     z-index: 1;
}
 .card.is-expanded:hover .card__inner {
	 transform: scale(1);
}
 .card.is-inactive .card__inner {
	 pointer-events: none;
	 opacity: 0.5;
}
 .card.is-inactive:hover .card__inner {
	 background-color: #949fb0;
	 transform: scale(1);
}
 @media screen and (min-width: 992px) {
	 .card:nth-of-type(3n+2) .card__expander {
		 margin-left: calc(-100% - 30px);
	}
	 .card:nth-of-type(3n+3) .card__expander {
		 margin-left: calc(-200% - 60px);
	}
	 .card:nth-of-type(3n+4) {
		 clear: left;
	}
	 .card__expander {
		 width: calc(300% + 60px);
	}
}
 @media screen and (min-width: 768px) and (max-width: 991px) {
	 .card:nth-of-type(2n+2) .card__expander {
		 margin-left: calc(-100% - 30px);
	}
	 .card:nth-of-type(2n+3) {
		 clear: left;
	}
	 .card__expander {
		 width: calc(200% + 30px);
	}
}
 
 
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Aperturas de Cajas </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Aperturas de Cajas </h4>
                <div class="box" id="corteX">
                    <div class="box-body">

                    <!--
                    <div class="col-md-12">
                        <label for="sucursales">Usuario</label>
                        <select name="usuariofiltro" id="usuariofiltro" class="form-control input-lg select2" style="width: 100%;">
                            <option value="">Todos</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ACTIVO = 1");
                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                            ?>
                                <option value="<?php echo $row_recordset32['NOMBRE_USUARIO']; ?>"><?php echo $row_recordset32['NOMBRE_USUARIO']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br><br>
                    </div>
                    -->




                    <div class="wrapper">

                        <div class="header">
                            <h1 class="header__title">Cajas Abiertas</h1>
                            <h2 class="header__subtitle">Cajas/Usuarios</h2>
                        </div>

                        <div class="cards">

                            <?php
                            $QueryAperturaCaja = mysqli_query($conn3, "SELECT * FROM AperturaCaja WHERE Activo = 1");
                            while ($RowAperturaCaja = mysqli_fetch_array($QueryAperturaCaja)) {
                                
                                $Pos = $RowAperturaCaja["Pos"];
                                $Usuario_id_Apertura = $RowAperturaCaja["usuario_id"];

                                $Fecha = $RowAperturaCaja["Fecha"];
                                $Hora = $RowAperturaCaja["Hora"];
                                /////////////////////////////////////////////////////
                                $NombreCaja = funcionMaster($Pos,'id','Nombre','PuntoPOS');
                                $NombreUsuario = funcionMaster($Usuario_id_Apertura,'ID','NOMBRE_USUARIO','usuarios');

                                $ArregloMediosPago=[];
                                $ArregloClientes=[];
                                $Operaciones=0;
                                $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                    $MedioPago_id = $RowMedioPago['id'];
                                    $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                    $ArregloMediosPago[$MedioPago_id]["Nombre"]=$Nombre_MedioPago;
                                    $ArregloMediosPago[$MedioPago_id]["Valor"]="0";

                                }

                                            
                                $QueryOperacion = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE Pos = '$Pos' AND Corte = 0 ");
                                while ($RowOperacion = mysqli_fetch_assoc($QueryOperacion)) {
                                    $idOperacion = $RowOperacion['idOperacion'];

                                    $cliente_id = $RowOperacion['idCliente'];

                                    $QueryPagos = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = '$idOperacion' ");
                                    while ($RowPagos = mysqli_fetch_assoc($QueryPagos)) {
                                        $metodo_pago = $RowPagos['metodo_pago'];
                                        $ArregloMediosPago[$metodo_pago]["Valor"]+= $RowPagos['nota_pago'];
                                    }

                                    $ArregloClientes[$cliente_id]+=$ArregloClientes[$cliente_id]+1;
                                    $Operaciones++;
                                }
                                
                                $CantidadClientes = count(array_keys($ArregloClientes));
                                                
                                echo "<div class=' card [ is-collapsed ] '>
                                    <div class='card__inner [ js-expander ]'>
                                        <i style='height:1rem; width:auto; margin-right:8px;' class='nav-icon fas fa-inbox fa-4x'></i><br>
                                        <span>Caja: {$NombreCaja}<br> Usuario: {$NombreUsuario}</span>
                                        <i class='fa fa-folder-o'></i>
                                    </div>
                                    <div class='card__expander'>
                                        <i class='fa fa-close [ js-collapser ]' style='z-index:2'></i>
                                        
                                        <div class='row' style='width: 100%;'>
                                        <div class='col-md-12' style='text-align:center'>
                                        <br>
                                        <h2>Mas Información</h2>
                                        <hr>
                                        </div>
                                        <div class='col-md-6'>
            
                                            <table class='table table-striped'>
                                                        <thead>
                                                            <tr>
                                                                <th>Método de Pago</th>
                                                                <th>Total en Caja</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";

                                        foreach ($ArregloMediosPago as $key => $value) {
                                            echo "<tr>";
                                            echo "<td>".$value['Nombre'],"</td>";
                                            echo "<td>".number_format($value['Valor'], 0, ',', '.')."</td>";
                                            echo "</tr>";
                                        }

                                        echo"</tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Método de Pago</th>
                                                    <th>Total en Caja</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>";

                                    echo "<div class='col-md-6'>
                                            <p>Cantidad Clientes Atendidos : {$CantidadClientes}</p><br>
                                            <p>Cantidad Operaciones Realizadas : {$Operaciones}</p><br>
                                            <p>Fecha - Hora : {$Fecha} : {$Hora}</p><br>
                                          </div>
                                            ";

                                echo"</div><!--cierre row-->
                                    </div>
                                </div>";
                            }
                            ?>




                        </div>

                    </div>









                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'footer.php';
?>


<script>
var $cell = $('.card');

//open and close card when clicked on card
$cell.find('.js-expander').click(function() {

  var $thisCell = $(this).closest('.card');

  if ($thisCell.hasClass('is-collapsed')) {
    $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
    $thisCell.removeClass('is-collapsed').addClass('is-expanded');
    
    if ($cell.not($thisCell).hasClass('is-inactive')) {
      //do nothing
    } else {
      $cell.not($thisCell).addClass('is-inactive');
    }

  } else {
    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    $cell.not($thisCell).removeClass('is-inactive');
  }
});

//close card when click on cross
$cell.find('.js-collapser').click(function() {

  var $thisCell = $(this).closest('.card');

  $thisCell.removeClass('is-expanded').addClass('is-collapsed');
  $cell.not($thisCell).removeClass('is-inactive');

});
</script>

<script>


$(document).ready(function() {
    var table = new DataTable('#TablaCortesX', {
        responsive: true,
        responsivePriority: 1
    });


   // Event listener para el elemento select
   $('#usuariofiltro').on('change', function() {
        var filtro = $(this).val();

        // Si el valor seleccionado es vacío, muestra todos los datos
        if (filtro === '') {
            table.column(3).search('').draw();
        } else {
            // Aplica el filtro a la columna 4 (índice 3) con el valor seleccionado
            table.column(3).search(filtro).draw();
        }
    });
});
</script>


