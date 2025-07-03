
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "sproveedores";
#Inicio


///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $ArregloCamposAdicionales=["TipoPersona","TipoEmpresa","Primer_Nombre","Segundo_Nombre","Primer_Apellido","Segundo_Apellido","TipoIdentificacion","DV","ObligacionFiscal","TributoReceptor","Datos_Api"];

    foreach ($ArregloCamposAdicionales as $key => $value) {
        $Campo1 = mysqli_query($conn3, "show COLUMNS from sproveedores WHERE Field = '$value';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `sproveedores` ADD `$value` TEXT NULL ");
        }
    }

    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos}, Datos_Api=1 WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='proveedores'</script>";
    } else {
        echo "<script language='Javascript'> window.location='proveedores'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
            }
            TipoPersonaProveedor();
            TipoIdentificacionProveedor();
        };
    </script>
<?php
}
#Cierre
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
            <li><a href="#"> Registro Datos Proveedor Soporte Documentos </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro Datos Proveedor Soporte Documentos </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            


                        <div class="col-md-12">
                            
       
                            <div class="card-body row" >
                                
                            <div class="form-group col-md-12">
                                <div align="left"><label>Tipo de Empresa</label></div>
                                <select class="form-control" name="Arreglo[TipoEmpresa]" id="TipoEmpresa" class="form-control input-lg" required>
                                    <option value="" selected>Seleccione</option>
                                    <option value="4">Persona Natural</option>
                                    <option value="7">Otra</option>
                                    <option value="6">Extranjera</option>
                                    <option value="3">Regimen Simplificado</option>
                                    <option value="5">Empresa Unipersonal</option>
                                    <option value="2">Regimen Común</option>
                                    <option value="1">Gran Contribuyente</option>
                                </select>
                                </div>

                                <div class="form-group col-md-12">
                                <div align="left"><label>Tipo de Persona</label></div>
                                <select class="form-control" name="Arreglo[TipoPersona]" id="TipoPersona" class="form-control input-lg" onChange="TipoPersonaProveedor()"   required>
                                    <option value="" selected>Seleccione</option>
                                    <option value="N">Persona Natural</option>
                                    <option value="J">Persona Jurídica</option>
                                    <option value="S">Sin Tipo</option>
                                </select>
                                </div>

                                

                                
                                <script>
                                function TipoPersonaProveedor(){
                                    var TipoIdentificacion = document.getElementById("TipoPersona").value;
                                    if(TipoIdentificacion=="N"){
                                    var DV = document.getElementById("CamposAdicionales");
                                    DV.style.display = "block";

                                    document.getElementById("Primer_Nombre").required = true;
                                    document.getElementById("Primer_Apellido").required = true;
                                    }else{
                                    var DV = document.getElementById("CamposAdicionales");
                                    DV.style.display = "none";

                                    document.getElementById("Primer_Nombre").required = false;
                                    document.getElementById("Primer_Apellido").required = false;

                                    document.getElementById("Primer_Nombre").value = "";
                                    document.getElementById("Primer_Apellido").value = "";

                                    }
                                }
                                </script>

                                <div class="form-group col-md-12" id="CamposAdicionales" style="display:none;">
                                
                                <div class="form-group col-md-12">
                                    <div align="left"><label>Primer Nombre</label></div>
                                    <input type="text" class="form-control input-lg" id="Primer_Nombre" name="Arreglo[Primer_Nombre]" placeholder="Primer Nombre"
                                    >
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left"><label>Segundo Nombre</label></div>
                                    <input type="text" class="form-control input-lg" id="Segundo_Nombre" name="Arreglo[Segundo_Nombre]" placeholder="Segundo Nombre"
                                    >
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left"><label>Primer Apellido</label></div>
                                    <input type="text" class="form-control input-lg" id="Primer_Apellido" name="Arreglo[Primer_Apellido]" placeholder="Primer Apellido"
                                    >
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left"><label>Segundo Apellido</label></div>
                                    <input type="text" class="form-control input-lg" id="Segundo_Apellido" name="Arreglo[Segundo_Apellido]" placeholder="Segundo Apellido"
                                    >
                                </div>

                                </div>


                                <div class="form-group col-md-12">
                                <div align="left"><label>Tipo de Identificación</label></div>
                                <select class="form-control" name="Arreglo[TipoIdentificacion]" id="TipoIdentificacion" class="form-control input-lg" onChange="TipoIdentificacionProveedor()" required>
                                    <option value="" selected>Seleccione</option>
                                    <option value="11" >Registro Civil de Nacimiento</option>
                                    <option value="12">Tarjeta de Identidad</option>
                                    <option value="13">Cédula de Ciudadanía</option>
                                    <option value="21">Tarjeta de Extranjería</option>
                                    <option value="22">Cédula de Extranjería</option>
                                    <option value="31">Nit</option>
                                    <option value="41">Pasaporte</option>
                                    <option value="42">Tipo de Documento Extranjero</option>
                                    <option value="43">Uso Definido por la Dian</option>
                                </select>
                                </div>
                                
                                <script>
                                function TipoIdentificacionProveedor(){
                                    var TipoIdentificacion = document.getElementById("TipoIdentificacion").value;
                                    if(TipoIdentificacion=="31"){
                                    var DV = document.getElementById("DV");
                                    DV.readOnly = false;
                                    DV.required = true;
                                    }else{
                                    var DV = document.getElementById("DV");
                                    DV.readOnly = true;
                                    DV.required = false;
                                    DV.value = "";
                                    }
                                }
                                </script>

                                <div class="form-group col-md-12">
                                <div align="left"><label>DV</label></div>
                                <input type="text" class="form-control input-lg" id="DV" name="Arreglo[DV]" placeholder="DV" value="" readonly>
                                </div>


                                <?php
                                $opciones_ObligacionFiscal = [
                                    "O-06" => "Ingresos y patrimonio",
                                    "O-07" => "Retención en la fuente a título de renta",
                                    "O-08" => "Retención timbre nacional",
                                    "O-09" => "Retención en la fuente en el impuesto sobre las ventas",
                                    "O-13" => "Gran contribuyente",
                                    "O-14" => "Informante de exógena",
                                    "O-15" => "Autorretenedor",
                                    "O-16" => "Obligación de facturar por ingresos de bienes y/o servicios excluidos",
                                    "O-17" => "Profesionales de compra y venta de divisas",
                                    "O-19" => "Productor y/o exportador de bienes exentos",
                                    "O-22" => "Obligado a cumplir deberes formales a nombre de terceros",
                                    "O-23" => "Agente de retención en el impuesto sobre las ventas",
                                    "O-32" => "Impuesto Nacional a la Gasolina y al ACPM",
                                    "O-33" => "Impuesto Nacional al consumo",
                                    "O-34" => "Régimen simplificado impuesto nacional consumo rest y bares",
                                    "O-36" => "Establecimiento Permanente",
                                    "O-37" => "Obligado a Facturar Electrónicamente Modelo 2242",
                                    "O-38" => "Facturación Electrónica Voluntaria Modelo 2242",
                                    "O-39" => "Proveedor de Servicios Tecnológicos PST Modelo 2242",
                                    "O-99" => "Otro tipo de obligado",
                                    "R-00-PN" => "Clientes del Exterior",
                                    "R-12-PN" => "Factor PN",
                                    "R-16-PN" => "Mandatario PN",
                                    "R-25-PN" => "Agente Interventor PN",
                                    "R-99-PN" => "No responsable PN",
                                    "R-06-PJ" => "Apoderado especial PJ",
                                    "R-07-PJ" => "Apoderado general PJ",
                                    "R-12-PJ" => "Factor PJ",
                                    "R-16-PJ" => "Mandatario PJ",
                                    "R-99-PJ" => "Otro tipo de responsable PJ",
                                    "A-01" => "Agente de carga internacional",
                                    "A-02" => "Agente marítimo",
                                    "A-03" => "Almacén general de depósito",
                                    "A-04" => "Comercializadora internacional (C.I.)",
                                    "A-05" => "Comerciante de la zona aduanera especial de Inírida, Puerto Carreño, Cumaribo y Primavera",
                                    "A-06" => "Comerciantes de la zona de régimen aduanero especial de Leticia",
                                    "A-07" => "Comerciantes de la zona de régimen aduanero especial de Maicao, Uribia y Manaure",
                                    "A-08" => "Comerciantes de la zona de régimen aduanero especial de Urabá, Tumaco y Guapí",
                                    "A-09" => "Comerciantes del puerto libre de San Andrés, Providencia y Santa Catalina",
                                    "A-10" => "Depósito público de apoyo logístico internacional",
                                    "A-11" => "Depósito privado para procesamiento industrial",
                                    "A-12" => "Depósito privado de transformación o ensamble",
                                    "A-13" => "Depósito franco",
                                    "A-14" => "Depósito privado aeronáutico",
                                    "A-15" => "Depósito privado para distribución internacional",
                                    "A-16" => "Depósito privado de provisiones de a bordo para consumo y para llevar",
                                    "A-17" => "Depósito privado para envíos urgentes",
                                    "A-18" => "Depósito privado",
                                    "A-19" => "Depósito público",
                                    "A-20" => "Depósito público para distribución internacional",
                                    "A-21" => "Exportador de café",
                                    "A-22" => "Exportador",
                                    "A-23" => "Importador",
                                    "A-24" => "Intermediario de tráfico postal y envíos urgentes",
                                    "A-25" => "Operador de transporte multimodal",
                                    "A-26" => "Sociedad de intermediación aduanera",
                                    "A-27" => "Titular de puertos y muelles de servicio público o privado",
                                    "A-28" => "Transportador 231nfor régimen de importación y/o exportación",
                                    "A-29" => "Transportista nacional para operaciones del régimen de tránsito aduanero",
                                    "A-30" => "Usuario comercial zona franca",
                                    "A-32" => "Usuario industrial de bienes zona franca",
                                    "A-34" => "Usuario industrial de servicios zona franca",
                                    "A-36" => "Usuario operador de zona franca",
                                    "A-37" => "Usuario aduanero permanente",
                                    "A-38" => "Usuario altamente exportador",
                                    "A-39" => "Usuario de zonas económicas especiales de exportación",
                                    "A-40" => "Deposito privado de instalaciones industriales",
                                    "A-41" => "Beneficiarios de programas especiales de exportación PEX",
                                    "A-42" => "Depósitos privados para mercancías en tránsito San Andrés",
                                    "A-43" => "Observadores de las operaciones de importación",
                                    "A-44" => "Usuarios sistemas especiales Importación exportación",
                                    "A-46" => "Transportador 231nformac régimen de importación y/o exportación",
                                    "A-47" => "Transportador terrestre régimen de importación y/o exportación",
                                    "A-48" => "Aeropuerto de servicio publico o privado",
                                    "A-49" => "Transportador fluvial régimen de importación",
                                    "A-50" => "Usuario industrial zona franca especial",
                                    "A-53" => "Agencias de aduanas 1",
                                    "A-54" => "Usuario Operador Zona Franca Especial",
                                    "A-55" => "Agencias de aduanas 2",
                                    "A-56" => "Agencias de aduanas 3",
                                    "A-57" => "Agencias de aduanas 4",
                                    "A-58" => "Transportador aéreo nacional",
                                    "A-60" => "Transportador aéreo, marítimo o fluvial modalidad Cabotaje",
                                    "A-61" => "Importador de alimentos de consumo humano y animal",
                                    "A-62" => "Importador Ocasional",
                                    "A-63" => "Importador de maquinaría y sus partes Decreto 2261 de 2012",
                                    "A-64" => "Beneficiario Programa de Fomento Industria Automotriz-PROFIA",
                                    "A-99" => "Otro tipo de agente aduanero",
                                    "E-01" => "Agencia",
                                    "E-02" => "Establecimiento de comercio",
                                    "E-03" => "Centro de explotación agrícola",
                                    "E-04" => "Centro de explotación animal",
                                    "E-05" => "Centro de explotación minera",
                                    "E-06" => "Centro de explotación de transformación",
                                    "E-07" => "Centro de explotación de servicios",
                                    "E-08" => "Oficina",
                                    "E-09" => "Sede",
                                    "E-10" => "Sucursal",
                                    "E-11" => "Consultorio",
                                    "E-12" => "Administraciones",
                                    "E-13" => "Seccionales",
                                    "E-14" => "Regionales",
                                    "E-15" => "Intendencias",
                                    "E-16" => "Local o negocio",
                                    "E-17" => "Punto de venta",
                                    "E-18" => "Fábrica",
                                    "E-19" => "Taller",
                                    "E-20" => "Cantera",
                                    "E-21" => "Pozo de Petróleo y Gas",
                                    "E-22" => "Otro lugar de tipo de extracción o explotación de recursos naturales",
                                    "E-99" => "Otro tipo de establecimiento"
                                ];
                                
                                ?>

                                <div class="form-group col-md-12">
                                <div align="left"><label>Obligación Fiscal</label></div>
                                <select class="form-control" name="Arreglo[ObligacionFiscal]" id="ObligacionFiscal" class="form-control input-lg" onChange="TipoPersonaProveedor()" required>
                                    <option value="" selected>Seleccione</option>
                                    <?php
                                        foreach ($opciones_ObligacionFiscal as $value => $text) {
                                            echo "<option value='$value'>$text</option>";
                                        }
                                    ?>
                                </select>
                                </div>

                                <?php
                                $opcionesTributo_Receptor = [
                                    "01" => "IVA",
                                    "02" => "IC",
                                    "03" => "ICA",
                                    "04" => "INC",
                                    "05" => "ReteIVA",
                                    "06" => "ReteFuente",
                                    "07" => "ReteICA",
                                    "20" => "FtoHorticultura",
                                    "21" => "Timbre",
                                    "22" => "Bolsas",
                                    "23" => "INCarbono",
                                    "24" => "INCombustibles",
                                    "25" => "Sobretasa Combustibles",
                                    "26" => "Sordicom",
                                    "ZY" => "No causa",
                                    "ZZ" => "Nombre de la figura tributaria",
                                ];
                                ?>

                                <div class="form-group col-md-12">
                                <div align="left"><label>Tributo Receptor</label></div>
                                <select class="form-control" name="Arreglo[TributoReceptor]" id="TributoReceptor" class="form-control input-lg" onChange="TipoPersonaProveedor()" required>
                                    <option value="" selected>Seleccione</option>
                                    <?php
                                        foreach ($opcionesTributo_Receptor as $value => $text) {
                                            echo "<option value='$value'>$text</option>";
                                        }
                                    ?>
                                </select>
                                </div>

                                


                            </div>


                        </div>


                            <input type="hidden" name="Datos_Api" value="1">
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

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