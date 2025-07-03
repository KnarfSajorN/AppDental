
<?php
include 'header.php';
include 'menu.php';

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
.Backk-Color{
    background-color: #9cc3db;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reportes Contables </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Reportes Contables </h4>
                <div class="box">
                    <div class="box-body row">

                    <div class="col-md-12 center text-center" align="center">
                        <h3>Reportes</h3>
                    </div>

                    <div class="col-md-6">
                        <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_Reporte_mayorCont.php">
                          <li class="fa fa-circle-o"></li>
                          <strong> Mayores Contables</strong>
                        </a>
                    </div>

                    <div class="col-md-6">
                      <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_Reporte_mayorCont_Centrocostos.php">
                        <li class="fa fa-circle-o"></li>
                        <strong> Mayores Contables con Centro de Costos</strong>
                      </a>
                    </div>

                    <div class="col-md-6">
                      <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_Reporte_clienteCC.php">
                        <li class="fa fa-circle-o"></li>
                        <strong> Reporte de Clientes con Cuenta Contable</strong>
                      </a>
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_Reporte_clienteCdC.php">
                        <li class="fa fa-circle-o"></li>
                        <strong> Reporte de Clientes con Centro de Costos</strong>
                      </a>
                    </div>


                    <div class="col-md-6">
                      <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModuloReporte_BalanceComprobacion.php">
                        <li class="fa fa-circle-o"></li><strong> Balance de Comprobación</strong>
                      </a>
                    </div>

                    <div class="col-md-6">
                      <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Estado De Ganancia y Perdida">
                        <li class="fa fa-circle-o"></li><strong> Estado de Ganancias y Perdidas</strong>
                      </a>
                    </div>












                    <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Balance Prueba">
                                <li class="fa fa-circle-o"></li><strong>Reporte de Balance Prueba</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Estado Resultado Integral">
                                <li class="fa fa-circle-o"></li><strong>Reporte de Estado Resultado Integral</strong>
                              </a>
                            </div>


                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Comprobantes Detallados">
                                <li class="fa fa-circle-o"></li><strong>Reporte de Comprobantes Detallados</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro Diario Resumido">
                                <li class="fa fa-circle-o"></li><strong>Reporte de Libro Diario Resumido</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Estado De Situacion Financiera">
                                <li class="fa fa-circle-o"></li><strong>Reporte de Estado De Situacion Financiera</strong>
                              </a>
                            </div>







                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro Oficial De Compras">
                                <li class="fa fa-circle-o"></li><strong>Libro Oficial De Compras</strong>
                              </a>
                            </div>


                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Consecutivo De Comprobantes">
                                <li class="fa fa-circle-o"></li><strong>Consecutivo De Comprobantes</strong>
                              </a>
                            </div>



                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Auxiliar De Centro De Costo Por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Auxiliar De Centro De Costo Por Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Auxiliar De Proveedores Por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Auxiliar De Proveedores Por Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Nota Debito y Credito [Venta y Compras]">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Nota Debito y Credito [Venta y Compras]</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Ventas Por Centro De Costo">
                                <li class="fa fa-circle-o"></li><strong>Ventas Por Centro De Costo</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro Oficial de Ventas">
                                <li class="fa fa-circle-o"></li><strong>Libro Oficial de Ventas</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Auxiliar Por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Auxiliar Por Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Auxiliar Cuenta Contable Por Tercero">
                                <li class="fa fa-circle-o"></li><strong>Auxiliar Cuenta Contable Por Tercero</strong>
                              </a>
                            </div>


                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Auxiliar De Tercero Por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Auxiliar De Tercero Por Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Movimiento Auxiliar De Gastos Por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Movimiento Auxiliar De Gastos Por Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro Diario">
                                <li class="fa fa-circle-o"></li><strong>Libro Diario</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro Mayor y Balance">
                                <li class="fa fa-circle-o"></li><strong>Libro Mayor y Balance</strong>
                              </a>
                            </div>


                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Cuentas Por Pagar Por Centro De Costo">
                                <li class="fa fa-circle-o"></li><strong>Cuentas Por Pagar Por Centro De Costo</strong>
                              </a>
                            </div>



                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Auxiliar Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong>Auxiliar Cuenta Contable</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Auxiliar Cuenta Contable Por Centro De Costo">
                                <li class="fa fa-circle-o"></li><strong>Auxiliar Cuenta Contable Por Centro De Costo</strong>
                              </a>
                            </div>

                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Comprobante Informe Diario">
                                <li class="fa fa-circle-o"></li><strong>Comprobante Informe Diario</strong>
                              </a>
                            </div>



                            









                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados.php?Tipo=Libro de Inventario y Balance">
                                <li class="fa fa-circle-o"></li><strong> Libro de Inventario y Balance</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Resumen Forma de Pago">
                                <li class="fa fa-circle-o"></li><strong> Resumen Forma de Pago </strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Movimiento auxiliar de Activos Fijos">
                                <li class="fa fa-circle-o"></li><strong> Movimiento auxiliar de Activos Fijos</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Estado de resultado integral por naturaleza de gasto">
                                <li class="fa fa-circle-o"></li><strong> Estado de resultado integral por naturaleza de gasto</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Movimiento Auxiliar de Cartera por Cuenta Contable">
                                <li class="fa fa-circle-o"></li><strong> Movimiento Auxiliar de Cartera por Cuenta Contable</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Cartera por Centro de Costo">
                                <li class="fa fa-circle-o"></li><strong> Cartera por Centro de Costo</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Balance de prueba por Tercero">
                                <li class="fa fa-circle-o"></li><strong> Balance de prueba por Tercero</strong>
                              </a>
                            </div>
                            <div class="col-md-6">
                              <a class="btn btn-block btn-light m-1 text-left Backk-Color" href="RP_ModulosReportesPersonalizados_2.php?Tipo=Balance de prueba por Centro de Costo">
                                <li class="fa fa-circle-o"></li><strong> Balance de prueba por Centro de Costo</strong>
                              </a>
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

  <?php include 'PiedePaginasReportes.php'; ?>