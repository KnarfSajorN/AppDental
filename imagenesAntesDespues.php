<?php include('header.php') ?>
<?php
$clienteId = decrypt($_GET['cI']);
?>
<?php include('menu.php') ?>
<!-- <style>
	.card {
	  position: relative;
	  display: flex;
	  flex-direction: column;
	  min-width: 0;
	  word-wrap: break-word;
	  background-color: #fff;
	  background-clip: border-box;
	  border: 1px solid rgba(0, 0, 0, 0.125);
	  border-radius: 0.25rem;
	}
	.card-img-top {
	  width: 100%;
	}

	.card-img-top {
	  border-top-left-radius: calc(0.25rem - 1px);
	  border-top-right-radius: calc(0.25rem - 1px);
	}

	/*----------------------------------------------------------------------------*/
	.card {
		width: 20rem;
		transition: all 1s cubic-bezier(0.16, 0.91, 0.16, 0.91);
		box-shadow: -1px 1px 1px 1px transparent;
	}

	.card:hover {
		transform: scale(1.05) translate(4%, -4%);
		box-shadow: -4px 4px 4px 4px rgba(0, 0, 0, .5);
	}
</style> -->
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
                    <div class="row">
                        <div class="col-md-6" style="display:flex;justify-content: right; align-items: right;">
                            <button type="button" class="css-button-sharp--green" data-toggle="modal"
                                data-target="#RegImage">Cargar Imagen</button>
                        </div>
                        <div class="col-md-6" style="display:flex;justify-content: left; align-items: left; text-align: center;">
                            <a href="visorFotos?cI=<?=encrypt($clienteId)?>" class="css-button-sharp--green1" target="_BLANK">Ver
                                Imágenes</a>
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
                                            <input type="text" name="tit1" id="tit1" class="form-control"
                                                placeholder="Opcional">
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <label class="form-label">Descripción</label>
                                            <textarea class="form-control" name="desc1" id="desc1" cols="30" rows="10"
                                                placeholder="Opcional"></textarea>
                                        </div>
                                        <div style="margin-bottom: 15px;">
                                            <label class="form-label">Imagen</label>
                                            <input type="file" class="form-control" name="img1" id="img1"
                                                accept="image/*" required>
                                        </div>
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div style="display:flex;margin-bottom: 15px">
                                            <div style="margin: 0 15px;">
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
                                            </div>
                                        </div>
                                        <!---------------------------------------------------------------------------------------------------->
                                        <input type="hidden" name="cliente_id" id="cliente_id" value="<?=$clienteId?>">
                                        <!---------------------------------------------------------------------------------------------------->
                                        <div class="modal-footer">
                                            <!--button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button-->
                                            <button type="button" class="css-button-sharp--green4" data-dismiss="modal"
                                                aria-label="Close">Cerrar</button>
                                            <button type="submit" class="css-button-sharp--green"
                                                onclick="mostrarImagenes()">Cargar</button>
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
<?php include('footer.php') ?>
<script>
formulario = document.getElementById('form');




formulario.addEventListener('submit', function(e) {
    e.preventDefault();
    datos = new FormData(formulario);
    fetch('guardarImg.php', {
            method: "POST",
            body: datos,
        })
        .then(res => res.json())
        .then(res => {
            if (res == 0) {
                mostrarImagenes();
                $('#RegImage').modal('hide');
            }
        })
})
</script>
<script>
function mostrarImagenes() {
    cliente_id = document.getElementById('cliente_id').value;
    $.ajax("ajaxMostrarImagenes.php?cliente_id=" + cliente_id, {
        success: function(response) {
            document.getElementById("nose").innerHTML = response;
            imgLoadingLazy()
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
                var alturaMaxima = 0;
                $(".card-img-top").each(function() {
                    if ($(this).height() > alturaMaxima) {
                        alturaMaxima = $(this).height();
                    }
                });
                $(".card-img-top").height(alturaMaxima);
            });


        }
    });
}
mostrarImagenes();

function Eliminar(idEliminar) {
    if (window.confirm("Estas seguro de que quieres borrar este registro")) {
        fetch('guardarImg.php?idEliminar=' + idEliminar, {}).then(res => res.json()).then(res => {
            if (res == 0) {
                mostrarImagenes();
            }
        })
        //document.location='eliminarDoc.php?idEliminar=' + idEliminar;
    }
}
</script>