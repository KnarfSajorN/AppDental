<style type="text/css">
    .toggle0 {
        color: #a94442;
    }

    .toggle1 {
        color: #3c763d;
    }
</style>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse2">Cupos por Hora</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="col-md-4">
                    <label for="rangoDesde">Rango Desde</label>
                    <input type="time" class="form-control input-lg" name="rangoDesde" id="rangoDesde" value="<?= Date("H:i") ?>">
                </div>
                <div class="col-md-4">
                    <label for="rangoDesde">Rango Hasta</label>
                    <input type="time" class="form-control input-lg" name="rangoHasta" id="rangoHasta" value="<?= Date("H:i") ?>">
                </div>
                <div class="col-md-4">
                    <label for="cupos">Cupos</label>
                    <input type="number" class="form-control input-lg" name="cupos" id="cupos" value="1" min="1">
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary btn-block" onclick="addRangoHoras({idUsuario:<?= $_SESSION['ID'] ?>,rangoDesde:$('#rangoDesde').val(),rangoHasta:$('#rangoHasta').val(),cupos:$('#cupos').val()})" id="btnCuposPorHora" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">AGREGAR</button>
                </div>
                <div class="col-md-12" style="margin: 20px 0 0 0;">
                    <div class="row">
                        <div class="col-md-6" style="margin-right: 0; padding-right: 0; border-right: none;">
                            <button type="button" class="btn btn-success btn-block" onclick="updateToggle({activo:1})" id="btnCuposPorHora" style="border-bottom-right-radius: 0px; border-top-right-radius: 0px;">ACTIVAR RANGOS</button>
                        </div>
                        <div class="col-md-6" style="margin-left: 0; padding-left: 0; border-left: none;">
                            <button type="button" class="btn btn-danger btn-block" onclick="updateToggle({activo:0})" id="btnCuposPorHora" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px;">DESACTIVAR RANGOS</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <hr style="width: 100%; height: 0; border: 1px solid #8b8b8b;">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <table class="" id="cargaDataTable" style="width: 100% !important;">
                            <thead style="width: 100% !important;">
                                <tr style="width: 100% !important;">
                                    <th style="width:30%">Hora Desde</th>
                                    <th style="width:30%">Hora Hasta</th>
                                    <th style="width:20%">Cupos</th>
                                    <th style="width:20%">Op</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">Cupos, Hora en Calendario de Directorio Medico</div>
        </div>
    </div>
</div>

<hr>