<?php
$queryImg = mysqli_query($conn3, "SELECT * FROM archivos where cliente_id = '{$idCliente}'");
$nrowlER = mysqli_num_rows($queryImg);
while ($resulImg = mysqli_fetch_array($queryImg)) {
    $nombreArchivo2 = "";
    $nombreArchivo = $resulImg['codigo'];
    $extencion = explode(".", $nombreArchivo);
    $arrayFormato = ['pdf', 'txt', 'xlsx', 'xls', 'jpg', 'jpeg', 'png', 'rar', 'zip', 'docx'];
    $arrayIcon = ['file-pdf', 'file', 'file-excel', 'file-excel', 'file-image', 'file-image', 'file-image', 'file-archive', 'file-archive', 'file-word'];
    $pos = array_search($extencion[count($extencion) - 1], $arrayFormato);
    if ($pos === false) {
        $pos = 1;
    }
    if (strlen($nombreArchivo) > 31) {
        for ($i = 0; $i < 29; $i++) {
            $nombreArchivo2 .= $nombreArchivo[$i];
        }
        $nombreArchivo = $nombreArchivo2 . "..." . $extencion[count($extencion) - 1];
        # code...
    }
    $sizeFile = number_format(((filesize("archivos/" . $resulImg['codigo']) / 8)), 2, ',', '');
    // 1 Byte = 8 Bit
    // 1 Kilobyte = 1.024 Bytes
    // 1 Megabyte = 1.048.576 Bytes
    // 1 Gigabyte = 1.073.741.824 Bytes
    // 1 Terabyte = 1.099.511.627.776 Bytes
    if ($sizeFile >= 1099511627776) {
        $sizeFile = number_format(($sizeFile / 1099511627776), 2, ',', '') . " TB";
    } else if ($sizeFile >= 1073741824) {
        $sizeFile = number_format(($sizeFile / 1073741824), 2, ',', '') . " GB";
    } else if ($sizeFile >= 1048576) {
        $sizeFile = number_format(($sizeFile / 1048576), 2, ',', '') . " MB";
    } else if ($sizeFile >= 1024) {
        $sizeFile = number_format(($sizeFile / 1024), 2, ',', '') . " KB";
    } else {
        $sizeFile .= " B";
    }

?>
    <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card">
            <div class="file">
                <a href="archivos/<?php echo $resulImg['codigo']; ?>" target="blank_">
                    <div class="hover">
                        <button type="button" class="btn btn-icon btn-danger" onclick="window.open('archivos/<?php echo $resulImg['codigo']; ?>')">
                            <i class="fa fa-eye" style="margin-right: 5px"></i> |
                            <i class="fa fa-download" style="margin-left: 5px"></i>
                        </button>
                    </div>
                    <div class="icon">
                        <i class="fa fa-<?= $arrayIcon[$pos] ?> text-info"></i>
                    </div>
                    <div class="file-name">
                        <p class="m-b-5 text-muted"><?= $nombreArchivo ?></p>
                        <small>Size: <?= $sizeFile ?> <span class="date text-muted"><?= $resulImg['fecha'] ?></span></small>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php
}
?>