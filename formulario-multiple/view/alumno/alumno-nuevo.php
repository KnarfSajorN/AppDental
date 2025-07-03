<h1 class="page-header">
    <?php echo $alm->__GET('id') != null ? $alm->__GET('Nombre') : 'Registro Múltiple de Alumnos'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Alumno">Alumnos</a></li>
  <li class="active">Registro Múltiple de Alumnos</li>
</ol>

<form id="frm-alumno" action="?c=Alumno&a=CrearMultiple" method="post" enctype="multipart/form-data">
    
    <div id="alumnos" class="row">
<div id="lo-que-vamos-a-copiar">
    <div class="col-xs-4">
        <div class="well well-sm">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="Nombre[]" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="Apellido[]" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="text" name="Correo[]" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
            </div>

            <div class="form-group">
                <label>Sexo</label>
                <select name="Sexo[]" class="form-control">
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>

            <div class="form-group">
                <label>Fecha de nacimiento</label>
                <input readonly type="text" name="FechaNacimiento[]" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="Foto[]" placeholder="Ingrese una imagen" />
                    </div>     
                </div>
            </div>  
        </div>
    </div>            
</div>
<div class="col-xs-4">
    <div class="well">
        <button id="btn-alumno-agregar" class="btn btn-lg btn-block btn-default" type="button">Agregar</button>                
    </div>
</div>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success btn-lg btn-block">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario_alumno = $("#lo-que-vamos-a-copiar").html();
        
// El encargado de agregar más formularios
$("#btn-alumno-agregar").click(function(){
    // Agregamos el formulario
    $("#alumnos").prepend(formulario_alumno);

    // Agregamos un boton para retirar el formulario
    $("#alumnos .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-alumno" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#alumnos .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#alumnos").on('click', '.btn-retirar-alumno', function(){
            $(this).closest('.col-xs-4').remove();
        })
            
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>