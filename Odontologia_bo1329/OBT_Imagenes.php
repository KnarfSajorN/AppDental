<?php 
require_once __DIR__ . '/../header.php'; 
require_once __DIR__ . '/../menu.php';
$clienteId = decrypt($_GET['cI']);


?>

<style>
	/* Boton sucess */
.css-button-sharp--green {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #57cc99;
    background: #57cc99;
	border-radius: 30px;
}

.css-button-sharp--green:hover {
    background: #fff;
    color: #57cc99
}
/* Botón primary */
.css-button-sharp--green1 {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #117a8b;
    background: #117a8b;
	border-radius: 30px;
}

.css-button-sharp--green1:hover {
    background: #fff;
    color: #117a8b
}
/* Botón secondary */
.css-button-sharp--green4 {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #6c757d;
    background: #6c757d;
	border-radius: 30px;
}

.css-button-sharp--green4:hover {
    background: #fff;
    color: #6c757d;
}

<?php 

$categorias = [
    "Postura corporal" => ["Frente", "Perfil", "Tres cuartos"],
    "Fotos de cara" => ["Frente", "Perfil", "Tres cuartos"],
    "Fotos de boca" =>  ["Frente", "Overbite", "Lateral derecha", 'Lateral izquierda', 'Oclusal superior', 'Oclusal inferior'],
    "Fotos de modelos"=> ["Frente", "Overbite", "Lateral derecha", 'Lateral izquierda', 'Oclusal superior', 'Oclusal inferior'],
];

$categorias_json = json_encode($categorias);

?>

</style>
<div class="content-wrapper p-3">
    <section class="content-header">
        <h1>Historia exámenes</h1>
        <!-- <ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
			<li><a href="#">Historia exámenes </a></li>
		</ol> -->
    </section>
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <?php echo datosPacientes($clienteId); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <br>
                    <!-- Boton -->
                    <div class="row my-2">
                        <div class="col-md-6" style="display:flex;justify-content: right; align-items: right;">
                            <button type="button" class="btn btn-outline-info rounded-pill" data-toggle="modal" data-target="#RegImage"><i class="fas fa-upload"></i> Cargar Imagen</button>
                        </div>
                        <div class="col-md-6" style="display:flex;justify-content: left; align-items: left; text-align: center;">
                            <a href="OBT_ImagenesView?cI=<?=encrypt($clienteId)?>" class="btn btn-outline-primary rounded-pill" target="_BLANK"> <i class="fas fa-images"></i> Ver Imágenes</a>
                        </div>
                    </div>


                    <!-- The modal -->
                    <div class="modal fade" id="RegImage" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalLabelLarge">Nuevo documento</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="form">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div style="margin-bottom: 15px;">
                                            <label class="form-label">Titulo Procedimiento</label>
                                            <input type="text" name="tit1" id="tit1" class="form-control" placeholder="Opcional">
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <label class="form-label">Descripción</label>
                                            <textarea class="form-control" name="desc1" id="desc1" style="height: 100px" placeholder="Opcional"></textarea>
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <label class="form-label">Imagen</label>
                                            <input type="file" class="form-control" multiple name="img1[]" id="img1" accept="image/*" required>
                                        </div>
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div class="col-md-12 col-xs-12 row">
                                            <div class="col-md-4 col-xs-6">
                                                <label for="">Categoria</label>
                                                <select name="categoria" id="categoria" class="select2" onchange="mostrarSubCategorias(this.value)" style="width:100%">
                                                    <!-- <option value="">Seleccione</option> -->
                                                    <?php 
                                                    foreach ($categorias as $categoria => $subcategoria) {
                                                        $categoria = reem($categoria);
                                                        echo '<option value="'.$categoria.'">'.$categoria.'</option>';
                                                        
                                                    }
                                                    ?>
    
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-xs-6">
                                                <label for="">Subcategoria</label>
                                                <select name="subcategoria" id="subcategoria" class="select2" style="width:100%">
                                                    <option value="">Seleccione</option>
                                                </select>
                                            </div>
                                            <!-- <div style="margin: 0 15px;">
                                                Antes
                                                <input type="radio" name="anDes" id="anDes" value="0" required>
                                            </div>
                                            <div style="margin: 0 15px;">
                                                Durante
                                                <input type="radio" name="anDes" id="anDes" value="2">
                                            </div>
                                            <div style="margin: 0 15px;">
                                                Después
                                                <input type="radio" name="anDes" id="anDes" value="1">
                                            </div> -->
                                        </div>
                                        <!---------------------------------------------------------------------------------------------------->
                                        <input type="hidden" name="cliente_id" id="cliente_id" value="<?=$clienteId?>">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div class="modal-footer">
                                            <!--button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button-->
                                            <button type="button"  class="btn rounded-pill btn-outline-secondary" data-dismiss="modal"aria-label="Close"> <i class="fas fa-xmark"></i> Cerrar</button>
                                            <button type="submit" id="btn-save" class="btn rounded-pill btn-outline-primary"onclick="mostrarImagenes()"> <i class="fas fa-bookmark"></i> Cargar</button>
                                        </div>
                                        <!---------------------------------------------------------------------------------------------------->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="nose" onload="mostrarImagenes()"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once __DIR__  . '/../footer.php'; ?>
<script>


formulario = document.getElementById('form');
formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    $("#btn-save").prop("disabled", true);
    $("#btn-save").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Guardando</span>`);

    datos = new FormData(formulario);
    fetch('OBT_ImagenesGuardar', {
            method: "POST",
            body: datos,
        })
        .then( res => {
            $("#btn-save").prop("disabled", false);
            $("#btn-save").html(`<i class="fas fa-bookmark"></i> Cargar`);
            mostrarImagenes();
            $('#RegImage').modal('hide');

        })
})
</script>
<script>
function mostrarImagenes() {
    cliente_id = document.getElementById('cliente_id').value;
    $.ajax("OBT_ImagenesMostrar?cliente_id=" + cliente_id, {
        success: function(response) {            

            document.getElementById("nose").innerHTML = response;
            // imgLoadingLazy()
            // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            // var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            //     return new bootstrap.Popover(popoverTriggerEl)
            //     var alturaMaxima = 0;
            //     $(".card-img-top").each(function() {
            //         if ($(this).height() > alturaMaxima) {
            //             alturaMaxima = $(this).height();
            //         }
            //     });
            //     $(".card-img-top").height(alturaMaxima);
            // });


        }
    });
}
mostrarImagenes();

function Eliminar(idEliminar) {
    if (window.confirm("Estas seguro de que quieres borrar este registro")) {
        fetch('OBT_ImagenesGuardar?idEliminar=' + idEliminar, {}).then(res => res.json()).then(res => {
            
            if (res == 0) {
                mostrarImagenes();
            }
        })
        //document.location='eliminarDoc.php?idEliminar=' + idEliminar;
    }
}

const categorias = JSON.parse('<?=$categorias_json?>');

function mostrarSubCategorias(categoria) {
    const subcategorias = categorias[categoria];
    const options = subcategorias.map(subcategoria => `<option value="${subcategoria}">${subcategoria}</option>`).join('');
    document.getElementById('subcategoria').innerHTML = `` + options;
}

mostrarSubCategorias('Postura corporal')

</script>