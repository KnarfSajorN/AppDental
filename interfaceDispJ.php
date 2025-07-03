<?php
include 'header.php';
include 'menu.php';
$Obra = '';
$boton = '<button class="btn btn-block btn-primary" name="Guardar_obra" type="submit">Previsualizar datos</button>';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Interface - SYSMEX XP-300</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Interface - SYSMEX XP-300 </h4>

                <div class="box">
                    <div class="box-header">

                        <!-- inicio -->
                        <div class="col-md-12">
                            <br>
                            <div class="col-md-6 text-right">
                                <h4>SYSMEX XP-300 </h4>
                            </div>
                            <div class="col-md-6"><IMG STYLE="height:10em;" SRC="https://www.grupoinyectadelgolfo.com.mx/wp-content/uploads/2018/04/XP-300-Hematologia-Grupo-Inyecta-1.jpg"></IMG></div>
                        </div>
                        <div class="col-md-12 center text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modelId">
                                Previsualizar pendientes
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pendientes por cargar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body table-responsive no-padding">
                                                <table id="" class="table table-bordered table-striped table-responsive" style="font-size:18px; width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Folio</th>
                                                            <th>Cve. maquina</th>
                                                            <th>Cve. Sistema</th>
                                                            <th>Resultados</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>2022-03-04</td>
                                                            <td>220420732908</td>
                                                            <td>MCH</td>
                                                            <td>BH6</td>
                                                            <td>20.46</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2022-03-04</td>
                                                            <td>220420732908</td>
                                                            <td>BH7</td>
                                                            <td>BH7</td>
                                                            <td>37.66</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2022-03-04</td>
                                                            <td>220420732908</td>
                                                            <td>BH8</td>
                                                            <td>BH8</td>
                                                            <td>27.55</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2022-03-04</td>
                                                            <td>220420732908</td>
                                                            <td>BH9</td>
                                                            <td>BH9</td>
                                                            <td>11.31</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2022-03-04</td>
                                                            <td>220420732908</td>
                                                            <td>BH10</td>
                                                            <td>BH10</td>
                                                            <td>16.84</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            <a href="interfaceDispJ_.php" type="button" class="btn btn-success">Cargar!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <label for="">Buscar</label>
                        </div>
                        <div class="col-md-3">
                            <label for="">Clave estudio Equipo</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="">Folio</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="">Fecha ini</label>
                            <input type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="">Fecha fin</label>
                            <input type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-2">
                            <label for="">-</label>
                            <button class="btn btn-primary btn-block">Buscar</button>
                        </div>


                        <!-- fin -->





                        <!-- proesar form -->
                        <div class="col-md-12">
                            <br>
                            <input type="hidden" name="idcliente" value="<?= $idE ?>" />

                        </div>
                        </form>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Folio</th>
                                        <th>Cve. maquina</th>
                                        <th>Cve. Sistema</th>
                                        <th>Resultados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>HCT</td>
                                        <td>BH1</td>
                                        <td>1.99</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>WBC</td>
                                        <td>BH2</td>
                                        <td>23.30</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>MCHC</td>
                                        <td>BH3</td>
                                        <td>17.78</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>HGB</td>
                                        <td>BH4</td>
                                        <td>13.46</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>RBG</td>
                                        <td>BH5</td>
                                        <td>28.38</td>
                                    </tr>
                                    <!-- <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>MCH</td>
                                        <td>BH6</td>
                                        <td>20.46</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>BH7</td>
                                        <td>BH7</td>
                                        <td>37.66</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>BH8</td>
                                        <td>BH8</td>
                                        <td>27.55</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>BH9</td>
                                        <td>BH9</td>
                                        <td>11.31</td>
                                    </tr>
                                    <tr>
                                        <td>2022-03-04</td>
                                        <td>220420732908</td>
                                        <td>BH10</td>
                                        <td>BH10</td>
                                        <td>16.84</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
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
<!-- /.content-wrapper -->

<?php
include 'footer.php';
?>