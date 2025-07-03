<?php

include 'header.php';
include 'menu.php';

$id = $_GET['id'];

$QueryHistoria = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaPrimeraInfancia where id = $id");
while ($RowHistoria = mysqli_fetch_array($QueryHistoria)) {

  $cliente_id = $RowHistoria['cliente_id'];
}

$TipoHistoria = "RIAS_HistoriaPrimeraInfancia";
$TipoHistoriaEncryptado = encrypt($TipoHistoria);


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

  <br><br>
  <section class="content">
    <div class="box">
        <div class="box-body">
            <br>
            <br>
            <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>RIAS_Pacientes.php">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas.php?clienteId=<?= ($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


            </div>

            <hr>

            <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>RIAS_Impresion.php?id=<?php echo ($id); ?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
              href="<?php echo $Base; ?>RM_ImprimirReceta.php?HC=<?php echo encrypt($id); ?>&NC=<?php echo $TipoHistoriaEncryptado; ?>">
              <i class="fa fa-print"></i> Imprimir Receta medica
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
              href="<?php echo $Base; ?>RIAS_ExamenesOrdenMedica.php?id=<?php echo ($id); ?>&hc=<?php echo $TipoHistoriaEncryptado; ?>">
              <i class="fa fa-print"></i> Imprimir Examenes / Orden Medica
            </a>


            </div>


            <div align="center">
            <hr>
            </div>

            <div align="center">

            <div class="dropdown">
              <button class="btn btn-outline-info btn-lg rounded-pill shadow dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Visualizar Graficas de Crecimiento Actuales
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 50%;left: 25%;text-align: -webkit-center;">

                <a class="btn btn-outline-info btn-lg rounded-pill shadow"  style="width: 90%;margin-top: 5px;margin-bottom:5px"target="_blank" href="<?php echo $Base; ?>ModulosRIAS/Graficas/TallaEdad.php?clienteId=<?php echo ($cliente_id); ?>"> <i class="fa fa-print"> Talla para la Edad</i></a>
                
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" style="width: 90%;margin-top: 5px;margin-bottom:5px" target="_blank" href="<?php echo $Base; ?>ModulosRIAS/Graficas/PesoTalla.php?clienteId=<?php echo ($cliente_id); ?>"> <i class="fa fa-print"> Peso para la Talla</i></a>
                
                <a class="btn btn-outline-info btn-lg rounded-pill shadow"  style="width: 90%;margin-top: 5px;margin-bottom:5px"target="_blank" href="<?php echo $Base; ?>ModulosRIAS/Graficas/PerimetroCefalico.php?clienteId=<?php echo ($cliente_id); ?>"> <i class="fa fa-print"> Perimetro Cefalico</i></a>

                <a class="btn btn-outline-info btn-lg rounded-pill shadow"  style="width: 90%;margin-top: 5px;margin-bottom:5px"target="_blank" href="<?php echo $Base; ?>ModulosRIAS/Graficas/IMC.php?clienteId=<?php echo ($cliente_id); ?>"> <i class="fa fa-print"> IMC para la Edad</i></a>

                <a class="btn btn-outline-info btn-lg rounded-pill shadow"  style="width: 90%;margin-top: 5px;margin-bottom:5px"target="_blank" href="<?php echo $Base; ?>ModulosRIAS/Graficas/PesoEdad.php?clienteId=<?php echo ($cliente_id); ?>"> <i class="fa fa-print"> Peso para la Edad</i></a>

              </div>
            </div>

            </div>


        </div>
    </div>
  </section>


</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<?php include("footer.php") ?>

