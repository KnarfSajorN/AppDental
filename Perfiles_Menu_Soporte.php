<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $DetallesActivarDesactivar = $_POST['DetallesActivarDesactivar'];

    $queryList = mysqli_query($conn3, "UPDATE main_menu SET editable = 0");

    foreach ($DetallesActivarDesactivar as $key => $value) {
        echo "$key: $value <br>";

        $queryList = mysqli_query($conn3, "UPDATE main_menu SET editable = 1 WHERE id = $key");
    }

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo La Entidad Correctamente'</script>";
    }
    
}


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Activación/Desactivación de Menus </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Activación/Desactivación de Menus  </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                            <div class="col-md-12">
                                <h2 style="text-align: center;font-weight: bold;"> Menus</h2>
                                        <table id="" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Desactivar/Activar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    function quitarTildes($cadena) {
                                                        $tildes = array(
                                                            'á' => 'a',
                                                            'é' => 'e',
                                                            'í' => 'i',
                                                            'ó' => 'o',
                                                            'ú' => 'u',
                                                            'Á' => 'A',
                                                            'É' => 'E',
                                                            'Í' => 'I',
                                                            'Ó' => 'O',
                                                            'Ú' => 'U',
                                                            "\r\n"=>'',
                                                            "\r"=>'',
                                                            "\n"=>''
                                                        );
                                                        
                                                        $cadenaSinTildes = strtr($cadena, $tildes);
                                                        
                                                        return $cadenaSinTildes;
                                                    } 

                                                    function reem_menu_reves($texto1) 
                                                    {

                                                    //Rememplazamos caracteres especiales latinos minusculas
                                                    $repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
                                                    $find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
                                                    $texto1 = str_replace ($find, $repl, $texto1);


                                                    //Rememplazamos caracteres especiales latinos mayusculas
                                                    $repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
                                                    $find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
                                                    $texto1 = str_replace ($find, $repl, $texto1);

                                                    return $texto1;

                                                    }


                                                    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = 0 order by id ASC");
                                                        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                                                            $id = $RowMenu['id'];
                                                            $ArregloPrincipal[$id] = $RowMenu['id'];

                                                        }

                                                        $contador=0;
                                                        foreach ($ArregloPrincipal as $key => $value) {
                                                            
                                                            $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND id = $value order by id ASC");
                                                            while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                                                                $contador++;
                                                                $id = $RowMenu['id'];
                                                                $ArregloMenu[$contador]["id"] = $RowMenu['id'];

                                                                $Nom = quitarTildes($RowMenu['nombre']);
                                                                $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(utf8_encode($Nom));
                                                                $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
                                                                $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
                                                                $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];
                                                                $ArregloMenu[$contador]["Color"] = $RowMenu['color'];//Actualizacion de color
                                                                $ArregloMenu[$contador]["Editable"] = $RowMenu['editable'];
                                                                //filtro Portada
                                                                if($RowMenu['idPrincipal']=="0" && $RowMenu['pantalla']=="#"){
                                                                    $ArregloMenu[$contador]["NoAplicaPortada"] = "1";
                                                                }
                                                                //filtro Portada
                                                            }
                                                            
                                                            $QueryMenu = mysqli_query($conn3, "SELECT * FROM  main_menu WHERE estado = 1 AND idPrincipal = $value order by id ASC");
                                                            $nrowsSubmenus = mysqli_num_rows($QueryMenu);
                                                            $ArregloMenu[$contador]["Submenus"] = $nrowsSubmenus;
                                                            while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                                                                $contador++;
                                                                $id = $RowMenu['id'];
                                                                $ArregloMenu[$contador]["id"] = $RowMenu['id'];

                                                                $Nom = quitarTildes($RowMenu['nombre']);
                                                                $ArregloMenu[$contador]["Nombre"] = reem_menu_reves(utf8_encode($Nom));
                                                                $ArregloMenu[$contador]["Url"] = $RowMenu['pantalla'];
                                                                $ArregloMenu[$contador]["idPrincipal"] = $RowMenu['idPrincipal'];
                                                                $ArregloMenu[$contador]["Icono"] = $RowMenu['icon'];
                                                                $ArregloMenu[$contador]["Color"] = $RowMenu['color'];//Actualizacion de color
                                                                $ArregloMenu[$contador]["Editable"] = $RowMenu['editable'];
                                                            }

                                                        }

                                                //echo "<tr><td colspan='4'>";
                                                //echo "<pre>";
                                                //print_r($ArregloMenu);
                                                //echo "</pre></td></tr>";

                                                foreach ($ArregloMenu as $key => $value) {
                                                    $Nombre = $value['Nombre'];
                                                    $idPrincipal = $value['idPrincipal'];
                                                    $id= $value['id'];
                                                    if($idPrincipal=="0"){
                                                        $Tipo='Menu';
                                                    }else{
                                                        $Tipo="SubMenu";
                                                    }
                                                    $editable = $value['Editable'];

                                                    echo "<tr><th scope='row' width='2%'>{$key}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$Tipo}</td>";
                                                    if($editable=="1"){
                                                        echo "<td width='20%' align='center'> <input type='checkbox' class='' name='DetallesActivarDesactivar[$id]' checked></td></tr>";
                                                    }else{
                                                        echo "<td width='20%' align='center'> <input type='checkbox' class='' name='DetallesActivarDesactivar[$id]'></td></tr>";
                                                    }
                                                    
                                                }
                                                /*
                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");

                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Codigo = $rowMotorizado['Codigo'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    $ruta = str_replace('.php', '', $ruta);
                                                    echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                                                                    <td width='20%' align='center'>{$Codigo}</td>"
                                                    ;

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 100%;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                                                                                    <font> <a href='Rips_Convenios?entidad_id={$id}' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' style='width: 100%;margin-top:5px;margin-bottom:5px'> <i class='fa fa-book' title='Agregar Convenios'>  Agregar Convenios </i></a></font><br>
                                                                                                    </td></tr>";
                                                }
                                                */
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>

                        </form>


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