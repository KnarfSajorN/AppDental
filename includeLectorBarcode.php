<div class="input col-md-6">
    <button type="button" class="btn btn-outline-info btn-lg shadow" data-toggle="modal" data-target="#modalBarras"
        style="width:100%" onclick="focus()"><i class="fas fa-barcode"></i> Escanear código de barras</button>
</div>


<div id="modalBarras" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Escanear código de barras</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <input type="text" id="barcode" class="form-control" onkeyup="validarBarcode(this.value)">
                <div class="input col-md-12" id="content-datos-barcode" style="display:none">
                    <h5>Datos obtenidos</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>

    function validarBarcode(barcode) {

        if (barcode != "") {
            $('#content-datos-barcode').css('display', 'block');
            $('#content-datos-barcode').html('');
            console.log(getDatos(barcode));
            var datosObtenidos = getDatos(barcode);

            var innerContent = `
                <label>Primer Nombre: </label> <input type="text" id="pre_nombre" value='`+ datosObtenidos.nombre + `' class="form-control"><br>
                <label>Segundo Nombre: </label> <input type="text" id="pre_segundonombre" value='`+ datosObtenidos.s_nombre + `' class="form-control"><br>
                <label>Apellidos: </label><input type="text" id="pre_apellidos" value='`+ datosObtenidos.apellidos + `' class="form-control"><br>
                <label>No. Documento: </label><input type="text" id="pre_cedula" value='`+ datosObtenidos.cedula + `' class="form-control"><br>
                <label>Fecha de Expedicion: </label><input type="date" id="pre_nacimiento" value='`+ datosObtenidos.expedicion + `' class="form-control"><br>
                <label>Grupo Sanguineo: </label><input type="text" id="pre_gs" value='`+ datosObtenidos.grupoSanguineo + `' class="form-control"><br>
                <label>Sexo: </label><input type="text" id="pre_sexo" value='`+ datosObtenidos.sexo + `' class="form-control"><br>
                <button type="button" class="btn btn-info" data-dismiss="modal" onclick="mostrarDatos()">Cargar datos</button>

            `;


            document.getElementById('content-datos-barcode').innerHTML += innerContent;



        } else {
            $('#content-datos-barcode').css('display', 'none');
            $('#content-datos-barcode').html('');
        }



    }
    function getDatos(s) {
        s = s.replace(/[^a-zA-Z\-\+0-9]/g, " ");
        const texto = s.match(/[a-zA-Z]+/g);
        const numeros = s.match(/[\d]+/g);
        const grupoSanguineo = s.match(/(O|AB|A|B|)(\-|\+)/g);
        const fechaI = new Date(
            numeros[4].slice(0, 4),
            numeros[4].slice(4, 6) - 1,
            numeros[4].slice(6, 8)
        );
        const fechaFormateada = fechaI.getFullYear() + "-" + ('0' + (fechaI.getMonth() + 1)) + "-" + fechaI.getDate();
        return {
            nombre: [texto[3]].join(" "),
            apellidos: [texto[2], texto[1]].join(" "),
            s_nombre: texto[4],
            sexo: texto[5],
            cedula: numeros[2].slice(-10) * 1,
            expedicion: fechaFormateada,
            grupoSanguineo: grupoSanguineo[0],
        };
    }


    function mostrarDatos() {
        var pre_nombre = $('#pre_nombre').val();
        var pre_segundonombre = $('#pre_segundonombre').val();
        var pre_apellidos = $('#pre_apellidos').val();
        var pre_cedula = $('#pre_cedula').val();
        var pre_nacimiento = $('#pre_nacimiento').val();
        var pre_gs = $('#pre_gs').val();
        var pre_sexo = $('#pre_sexo').val();
        var arrayApellidos = pre_apellidos.split(' ');

        $('#CODI_CLIENTE').val(pre_cedula);
        $('#fechaNacimiento').val(pre_nacimiento);
        $('#primer_apellido').val(arrayApellidos[0]);
        $('#segundo_apellido').val(arrayApellidos[1]);
        $('#primer_nombre').val(pre_nombre);
        $('#segundo_nombre').val(pre_segundonombre);

        $('#genero').val(pre_sexo);

        switch (pre_gs) {
            case 'O+':
                $('#TipoSangre').val('O POSITIVO');
                break;

            case 'O-':
                $('#TipoSangre').val('O NEGATIVO');
                break;

            case 'A-':
                $('#TipoSangre').val('A NEGATIVO');
                break;

            case 'A+':
                $('#TipoSangre').val('A POSITIVO');
                break;

            case 'B-':
                $('#TipoSangre').val('B NEGATIVO');
                break;

            case 'B+':
                $('#TipoSangre').val('B POSITIVO');
                break;

            case 'AB+':
                $('#TipoSangre').val('AB POSITIVO');
                break;

            case 'AB-':
                $('#TipoSangre').val('AB NEGATIVO');
                break;

            default:
                break;
        }


        CalcularEdad(pre_nacimiento);



        //////////////////////////////////////////////////////
        $('#content-datos-barcode').html('');
        //////////////////////////////////////////////////////

    }

    function focus() {
        $('#barcode').focus()
    }





</script>