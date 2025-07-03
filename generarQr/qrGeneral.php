<?php

include '../header.php';
include '../menu.php';

$ID = $_SESSION['ID_principal'];

?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Generador de Qr</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="float-left">
                                            <h4>Generador de Qr</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="w-100">
                                            <div class="center text-center">
                                                <div class="col-md-12">
                                                    <div id="qrcode"></div>
                                                    <input type="text" class="form-control w-100" id="enlace" placeholder="Coloca el enlace aqui">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="">Tamaño del Qr</label>
                                                    <select id="tamano" class="form-control w-100">
                                                        <option value="200">200</option>
                                                        <option value="300">300</option>
                                                        <option value="400">400</option>
                                                        <option value="500">500</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="w-100">
                                            <div class="center text-center">
                                                <button class="btn mr-1 btn-success rounded-pill" onclick="generarQr()">
                                                    <i class="fa fa-qrcode"></i>
                                                    Generar Qr
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
include '../footer.php';
?>

<script>
    function generarQr(){
        // funcion para generar el qr con el api gratis de google
        //  https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example
        
        let tamano = 400;
        let enlace = document.getElementById('enlace').value;
        let qr = document.getElementById('qrcode');
        qr.innerHTML = '<img src=" https://api.qrserver.com/v1/create-qr-code/?size=' + tamano + 'x' + tamano + '&data=' + enlace + '">';
    }
</script>