
<div class="container-fluid"> 
<div class="row">
        <!-- Primer collapse -->
        <div class="col-md-12" style="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#Collapse_TallaEdad" onclick ="simularEventoResize()">
                            Talla para la Edad
                        </a>
                    </h4>
                </div>
                <div id="Collapse_TallaEdad" class="panel-collapse collapse in" style="width: 100%;">
                    <div class="panel-body">
                        <div id="Include_GraficaCrecimientoZ_TallaEdad" style="width: 100%;max-width:1065px; height: 400px; margin: 0px auto;"></div>
                        <label style="color:red"> Nota: En caso de que el valor correspondiente al mes del paciente ya esté registrado en la gráfica, el nuevo valor se utilizará para sustituir al anterior.</label>
                    </div>
                </div>
            </div>
        </div>


        <!-- Cuarto collapse -->
        <div class="col-md-12" style="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#Collapse_IMC" onclick ="simularEventoResize()">
                            IMC
                        </a>
                    </h4>
                </div>
                <div id="Collapse_IMC" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="Include_GraficaCrecimientoZ_IMC" style="width: 100%;max-width:1065px; height: 400px; margin: 0px auto;"></div>
                        <label style="color:red"> Nota: En caso de que el valor correspondiente al mes del paciente ya esté registrado en la gráfica, el nuevo valor se utilizará para sustituir al anterior.</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quinto collapse -->
        <div class="col-md-12" style="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#Collapse_PesoEdad" onclick ="simularEventoResize()">
                            Peso para la Edad
                        </a>
                    </h4>
                </div>
                <div id="Collapse_PesoEdad" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div id="Include_GraficaCrecimientoZ_PesoEdad" style="width: 100%;max-width:1065px; height: 600px; margin: 0px auto;"></div>
                        <label style="color:red"> Nota: En caso de que el valor correspondiente al mes del paciente ya esté registrado en la gráfica, el nuevo valor se utilizará para sustituir al anterior.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var anchoPantalla = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    //console.log("Ancho de la pantalla: " + anchoPantalla);

    function simularEventoResize() {
    var evento = new Event('resize');
    setTimeout(function() {
    window.dispatchEvent(evento);
    }, 500);
}

</script>