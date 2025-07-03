<!-- 
    Archivo depende de
    - guardarCita_include.php
    - disponibilidadHora_Include.php
    - disponibilidad.php
-->
<!-- lista -->


<div class="col-md-12">
<div class="row">
<div class="col-md-12 row">

<?php 

$queryList=mysqli_query($conn3,"SELECT * FROM  citas ");
    //$nrowl=mysqli_num_rows($queryList);
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
        $serial= $rowMotorizado['idCitas'];
        $serial1 = ($serial+1);

    }

$clienteId = decrypt($_GET['cI']);

include 'funciones/conn3.php';

    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");

    // $nrowl = mysqli_num_rows($queryList);

    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $usuario_id = $rowMotorizado['usuario_id'];
            $nombre_cliente = $rowMotorizado['nombre_cliente'];
            $indicativo = $rowMotorizado['indicativo'];
            $whatsapp = $rowMotorizado['whatsapp'];
            $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
            $correo_cliente = $rowMotorizado['correo_cliente'];
            $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
            $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
            $tipo_cliente = $rowMotorizado['tipo_cliente'];
            $fechar = $rowMotorizado['fechar'];
            $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
            $activo = $rowMotorizado['activo'];
            $genero = $rowMotorizado['genero'];
            $direccion_cliente = $rowMotorizado['direccion_cliente'];
            $telefono_cliente = $rowMotorizado['telefono_cliente'];
            $edad_cliente = $rowMotorizado['edad_cliente'];
            $profesion_cliente = $rowMotorizado['profesion_cliente'];
            $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
            $antecedentes = $rowMotorizado['antecedentes'];
        }
    }
    
    //     $_SESSION['NOMBRE_USUARIO']
  

 
?>
                    <div class="col-md-12"><?php echo $respuesta; ?></div>

                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Usuario</strong>
                        </div>
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;"  onChange="cargarFecha();">
                            <option value="" selected></option>
                            <?php
                            usuariosEspecialistasSelect();
                            ?>
                        </select>
                    </div>

                    <style type="text/css">
                        #div-fecha {
                            display: none;
                        }

                        #div-Hora {
                            display: none;
                        }
                    </style>

                    <div id="div-fecha" class="form-group col-md-6">
                        <!-- Fecha para verificar disponiblidad   -->
                        <div align="left">
                            <strong>Fecha</strong>
                        </div>
                        <input type="date" class="form-control input-lg" name="fecha" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();" >

                        <div id="div-results"></div>
                    </div>


                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Nombre Paciente</strong>
                        </div>
                        <input type="text" class="form-control input-lg" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre_cliente ?>" >
                    </div>

                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Celular</strong>
                        </div>
                        <input type="text" class="form-control input-lg" name="celular" id="celular" placeholder="Celular" value="<?php echo $whatsapp?>" >
                    </div>

                    <!--<div class="form-group col-md-2" style="margin-bottom: auto;">
                        <div align="left">
                            <strong>Indicativo</strong>
                        </div>
                        <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;" >
                            <option value="<?= $indicativo ?>" selected></option>
                            <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("", "numero", "numero,nombre", "indicativos");
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <div align="left">
                            <strong>Celular</strong>
                        </div>
                        <input type="number" class="form-control input-lg" name="telefono" placeholder="3206547898" value="<?= preg_replace("/^$indicativo/", '', $whatsapp)  ?>">
                      
                    </div>-->
                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Correo</strong>
                        </div>
                        <input type="email" class="form-control input-lg" name="correo" placeholder="Correo" value="<?php echo $correo_cliente ?>">
                        <font color="red" size="2">Para enviar la notificación al correo colocar el correo de los contrario no colocarlo </font>
                    </div>
                    <!--
                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Motivo de consulta</strong>
                        </div>
                        <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" value="<?php echo $motivoConsulta ?>" >
                    </div>
                    -->
                    <div class="form-group col-md-6">
                    <div align="left">
                        <strong>Motivo de Consulta</strong>
                    </div>
                    <select class="form-control select2" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" style="width:100%" onchange="tiempoMotivoConsulta(this.value, 'duracion')">
                    
                    <?php if ($motivoConsulta != '') { ?>
                                    <option value='<?= $motivoConsulta ?>'> <?= $motivoConsulta ?> </option>
                                    <?php } else { ?>
                                    <option value="" selected="selected">Seleccione...</option>
                                    <?php } ?>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta");
                                    //$nrowl = mysqli_num_rows($queryList);
                                    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                    // $cod = $row_recordset32A['cliente_id'];
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['descripcion'];

                                    echo "<option value='$id'> $nombre </option>";
                                    }
                                    ?>

                    </select>
                </div>

                    <div class="form-group col-md-6">
                        <div align="left">
                            <strong>Tiempo de Cita</strong>
                        </div>
                        <select id="duracion" name="duracion" class="form-control select2" data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" >
                            <option value="<?php echo $duracion ?>"> <?php echo categoria($duracion) ?> </option>
                            <option selected>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>30</option>
                            <option>45</option>
                            <option>60</option>
                            <option>80</option>
                            <option>120</option>
                        </select>
                    </div>


                    <div class="form-group col-md-12">
                        <div align="center">
                            <label>
                                <input type="radio" name="P" value="0" class="flat-red" checked>
                                <i class="fa fa-user"></i> Presencial

                                <input type="radio" name="P" value="2" class="flat-red" checked>
                                <i class="fa fa-user"></i> Domiciliaria

                                <?php if ($clienteId > 0) : ?>
                                    <input type="radio" name="P" value="1" class="flat-red" checked>
                                    <i class="fa fa-video-camera"></i> Virtual
                            </label>
                        <?php endif ?>
                        <?php if ($clienteId == '') : ?>
                            <br>
                            <i class="fa fa-video-camera"></i>
                            <a href="patientes">Para agendar citas virtuales debemos de seleccionar el paciente</a>
                        <?php endif ?>
                        </label>
                        </div>
                    </div>
                    <div align="center">
                        <div id="div-resultsHora">
                            <input type="hidden" name="citaAprobada" value="0">
                        </div>
                    </div>
                    <input type="hidden" name="idCitas" value="<?php echo $serial1 ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="sucursal" id="sucursal" value='<?= $_SESSION["sucursal"]; ?>'>
                </div>
            </div>
        </div>
<!--cierre de lista-->

<!-- Funciona para consultar disponibilidad -->

<script type="text/javascript">
    function verDia() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora() {
        // estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora_Include.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
            },
            success: function(response) {
                $('#div-resultsHora').html(response);
            }
        });
    };



    function cargarFecha() {
        var x = document.getElementById('div-fecha');
        x.style.display = 'none';

        if (x.style.display === 'none') {
            x.style.display = 'block';
        }
    }
</script>

<script type="text/javascript">
    $(function() {
        $('select[name="indicativo"]').on('change', function(e) {
            $('input[name="monto"]').val($(this).find(":selected").text());
        })
    })

    // seleccione el indicativo correspondiente
    <?php $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    if ($_GET['cI'] <> "") {
        $indicativo = funcionMaster($clienteId, 'cliente_id', 'indicativo', 'cliente');
    } else {
        $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
    }
    ?>
    $(window).on("load", function() {
        $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
        $('#indicativo').select2();
    });
</script>


<script>
    $(document).ready(function() {

        $('#duracion').select2({
            tags: true,
            createTag: function(params) {
                // Don't offset to create a tag if there is no @ symbol
                if (params.term.search('^[0-9]+$') == 0) {
                    // Return null to disable tag creation
                    return {
                        id: params.term,
                        text: params.term
                    }
                } else {
                    return null;
                }
                //console.log(params.term.search('/[0-9]/'));


            }
        });

    });
</script>
<!--para que funcione el motivo de consulta al agendar la cita -->
<script>
    const tiempoMotivoConsulta = (id, mascara) => {
    let data = {
      key: "info_motivoConsulta",
      mascara: mascara,
      id: id
    };
    $.ajax({
      url: "./ajax_calendar.php",
      data: data,
      type: "POST",
      dataType: "json",
      success: function(response) {
        console.log(response);
        if (response.status) {
          for (const key in object = response.data[0]) {
            if (Object.hasOwnProperty.call(object, key)) {
              if (key == mascara) {
                $(`#${key}`).val([object[key]]).trigger("change.select2");
                if ($(`#${key}`).val() != object[key]) {
                  $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[key]]).trigger("change.select2");
                }
              }
            }
          }
        }
      }
    });
  };
  </script>