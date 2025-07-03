<?php
include 'header.php';
include 'menu.php';
?>
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <div class="card-footer row">
                                <div class="col-md-12 cente text-center">
                                    <i class="far fa-frown-open fa-10x text-primary" style="opacity:0.3"></i>
                                    <p class="card-text mt-2">
                                        No puede acceder a <strong class="text-primary"><?=$_SESSION['urlActual']?></strong>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-8">
                                    <h3>Licencia Vencida</h3>
                                    <hr>
                                    <p class="card-text">
                                        Su licencia para utilizar <strong>Dentalsoft+</strong> ha expirado el <strong><?=$_SESSION['fechaVenceLic']?></strong>.
                                    </p>
                                    <p>
                                        Para continuar usando <strong>Dentalsoft+</strong>, debe renovar su licencia. Seleccione uno de nuestros planes disponibles y sigue disfrutando de todos los beneficios.
                                    </p>
                                    <a href="https://dentalsoftplus.com/renovacion/<?=base64_encode($_SESSION['ID'])?>" class="btn btn-primary mt-3">
                                        <i class="fas fa-key"></i>
                                        Renovar Licencia
                                    </a>
                                </div>
                                <div class="col-md-4 center text-center p-2">
                                    <img src="https://sievensoft.com/logosMarcas/dentalsoft/isologo.png" style="height:10rem; width:auto;">
                                </div>
                                
                            </div>
                            <div class="card-footer text-muted">
                                Si tiene alguna pregunta, póngase en contacto con el soporte técnico.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<?php
include 'footer.php';
?>