<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div id="procedimientoSlip">
    <h6 class="text-center">Procedimientos agregados &nbsp; &nbsp;&nbsp;&nbsp;<i onclick="toggleMinimize(this)" class="fa fa-window-minimize"></i></h6>
    <div id="tableList_content">
      <table id="tableList" class="table table-sm table-striped">
          <thead>
              <!-- <tr>
                  <th>Pieza</th>
                  <th>Cara</th>
                  <th>Procedimiento</th>
                  <th>Valor</th>
                  <th></th>
              </tr> -->
          </thead>
          <tbody id="procedimientosList"></tbody>
      </table>
    </div>

    <p class="fw-bold my-2">Total Cuota: <span id="totalOdds">0.00</span></p>

    <div class="col-md-12 col-xs-12 row">
        <div class="col-md-6 col-xs-12">
            <small for="">Fecha de vencimiento</small>
            <input type="date" id="fecha_vencimiento" value="<?=date('Y-m-d')?>" class="form-control form-control-sm">
        </div>
        <div class="col-md-6 col-xs-12">
            <small for="">Monto pagado</small>
            <input type="number" id="monto_pagado" value="0" class="form-control form-control-sm">
        </div>
        <div class="col-md-12 col-xs-12">
            <small for="">Observaciones</small>
            <textarea id="nota" class="form-control"></textarea>
        </div>
    </div>

    <div class="col-md-12 row my-2">
        <div class="col-md-6 col-xs-12">
            <button class="btn btn-outline-danger btn-sm w-100" onclick="clearProcedimientos()"> <i class="fas fa-xmark"></i> Borrar Todo</button>
        </div>
        <div class="col-md-6 col-xs-12">
            <button class="btn btn-outline-primary btn-sm w-100" type="button" onclick="guardarProcedimientos()" id="button-save"> <i class="fas fa-bookmark"></i> Guardar</button>
        </div>
    </div>
</div>