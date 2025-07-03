<?php
    include 'header.php';
    include 'menu.php';

    $idCitas = $_GET['idCitas'];
    $ID = $_GET['ID'];
   
	$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
  $queryList=mysqli_query($conn3,"SELECT * FROM  citas where idCitas = $idCitas");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $idCitas      = $row_recordset32['idCitas'];
                      $Doctor= $row_recordset32['doctor'];
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $nombre= $row_recordset32['nombre'];
                      $telefono= $row_recordset32['telefono'];
                      $correo= $row_recordset32['correo'];
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $activo= $row_recordset32['activo']; 
                      $estado= $row_recordset32['estado'];

}

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		 
		<ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
			<li><a href="#"> Consulta médica  </a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">
						
							<div class="box box-solid">

								<!-- /.box-header -->
								<div class="box-body">
									<div class="box-group" id="accordion1">
										<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
										<div align="center">
											
										<font color="blue">
									<h3> 
									AUTORIZAR CITA </h3>
										
									</font>  
										</div>
<?php
echo 'Especialista: <strong>'.funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios').'</strong><br>';
echo 'fecha: <strong> '. $fecha.'</strong><br>';
echo 'Hora: <strong> '. $Hora.'</strong><br>';
echo 'nombre:  <strong>'. $nombre.'</strong><br>';
echo 'telefono:  <strong>'. $telefono.'</strong><br>';
echo 'correo:  <strong>'. $correo.'</strong><br>';
echo 'motivoConsulta:  <strong>'. $motivoConsulta.'</strong><br>';

?>



<hr>


										<form action="guardarAutorizacion.php" method="POST" >

										

														<div class="form-group col-md-12">
															
<div class="form-group col-md-12">
				

															<div align="left">Nota comentarios</div>											
															<div align="right">
														<a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
												
												<div class="box-body pad">
													<textarea id="enfermedadActual" name="autorizaNota" class="textarea" placeholder="Nota comentarios
" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>
															
														</div>

													<input  type="hidden" name="idCitas" value="<?php echo $idCitas;?>">
													<input  type="hidden" name="ID"  value="<?php echo $ID;?>">
													<input  type="hidden" name="estado"  value="1">

													<input  type="hidden" name="autorizaIdUsuario"  value="<?php echo $_SESSION['ID']?>">
													 
													<div align="center">
														<br>
														<br>
														<br>
														<div class="col-sm-12">
															<br>
															<br>
															<center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>

														</div>
													</div>

													<input type="hidden"  name="tipo_cliente"   valur="1">
												</div>

											</div>

										</form>

									</div>

								 

			</div>

		</div>

	</section>

</div>


<?php include("footer.php")?>

 