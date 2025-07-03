<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$id = decrypt($_GET['i']);
$tabla = $_GET['tB'];

// 15 04 2023 - JRodriguez
// editar plantilla no funcionaba no permitia guardar ningun cambio, al parecer desde la ultima fecha de actualizado, 22 07 2022
// solo se formatea el nombre de la tabla para pasar por url get y poder guardar

$nombretabla = openssl_decrypt($tabla, 'AES-256-CBC', base64_decode('Medical'));
$tablaNuevo = urlencode(openssl_encrypt($nombretabla, 'AES-256-CBC', base64_decode('Medical')));

if (isset($_POST['Editar_Consentimiento'])) {
    $id = $_POST["id"];
    $consentimiento = $_POST["consentimiento"];

    $queryList = mysqli_query($conn3, "UPDATE {$nombretabla} SET Plantilla = '$consentimiento' WHERE id = $id;");

    echo "<script language='Javascript'> history.go(-2);</script>";
}

$usuario_id = $_SESSION['ID'];

$queryList = mysqli_query($conn3, "SELECT * FROM  {$nombretabla} where id='$id'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Plantilla = $rowMotorizado['Plantilla'];
}
?>
<!-- <script src="editorNuevo.js"></script> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Editar Consentimiento </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="content">
                <h4 class="Titulo_Pagina">Editar Consentimiento </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="documentoEditar?i=<?= encrypt($id); ?>&tB=<?php echo $tablaNuevo; ?>" method="POST">
                            <textarea  class="editorJR" name="consentimiento"><?php echo $Plantilla ?></textarea>
                            <br><br>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Editar_Consentimiento"><h2> <strong> A C T U A L I Z A R </strong> </h2></button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>


<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>