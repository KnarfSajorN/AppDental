<?php include('header.php') ?>
<?php
$clienteId = $_GET['clienteId'];
?>
<?php include('menu.php') ?>
<style>
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
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Historia exámenes</h1>
		<ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
			<li><a href="#">Historia exámenes </a></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
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
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#RegImage">Cargar Imagen</button>
						</div>
						<div class="col-md-6" style="display:flex;justify-content: left; align-items: left;">
							<a href="imgview.php?clienteId=<?=$clienteId?>" class="btn btn-info" target="_BLANK">Ver Imagenes</a>
						</div>
					</div>
					
					
					<!-- The modal -->
					<div class="modal fade" id="RegImage" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge" aria-hidden="true">
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
					                        <textarea class="form-control" name="desc1" id="desc1" cols="30" rows="10" placeholder="Opcional"></textarea>
					                    </div>
					                    <div style="margin-bottom: 15px;">
					                        <label class="form-label">Imagen</label>
					                        <input type="file" class="form-control" name="img1" id="img1" accept="image/*" required>
					                    </div>
					                    <!---------------------------------------------------------------------------------------------------->
					                    <div style="display:flex;margin-bottom: 15px">
					                        <div style="margin: 0 15px;">
					                            Antes
					                            <input type="radio" name="anDes" id="anDes" value="0" required>
					                        </div>
					                        <div style="margin: 0 15px;">
					                            Despues
					                            <input type="radio" name="anDes" id="anDes" value="1">
					                        </div>
					                    </div>
					                    <!---------------------------------------------------------------------------------------------------->
					                    <input type="hidden" name="cliente_id" id="cliente_id" value="<?=$clienteId?>">
					                    <!---------------------------------------------------------------------------------------------------->
					                    <div class="modal-footer">
					                        <!--button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button-->
					                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cerrar</button>
					                        <button type="submit" class="btn btn-success" onclick="mostrarImagenes()">Cargar</button>
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
				// console.log(response);
				document.getElementById("nose").innerHTML = response;
				var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
				var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
					return new bootstrap.Popover(popoverTriggerEl)
				var alturaMaxima = 0;
					console.log('alo');
					$(".card-img-top").each(function() {
						console.log($(this).height());
						console.log('entro');
						if ($(this).height() > alturaMaxima) {
							alturaMaxima = $(this).height();
						}
					});
					$(".card-img-top").height(alturaMaxima);
					console.log('fin');
				});

					
			}
		});
	}
	mostrarImagenes();
	function Eliminar(idEliminar) {
		if (window.confirm("Estas seguro de que quieres borrar este registro")) {
			fetch('guardarImg.php?idEliminar='+idEliminar, {}).then(res => res.json()).then(res => {
				if (res == 0) {
					mostrarImagenes();
				}
			})
			//document.location='eliminarDoc.php?idEliminar=' + idEliminar;
		}
	}
</script>