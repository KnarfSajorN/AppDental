<?php 
session_start();
// respaldos de la base de datos
// se arma arreglo para imprimir botones para poder realizar respaldos de la base de datos
// en el arreglo lleva, nombre, icono y consulta aql para el respaldo
$arrayBotonesRespaldos = [
    ['nombre' => 'Clientes', 'icono' => 'fa fa-users', 'consulta' => "SELECT * FROM  cliente WHERE 1=1 AND (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')"],

    ['nombre' => 'Historia Ortodoncia', 'icono' => 'fa fa-history', 'consulta' => "SELECT 
        hc.*,
        us.NOMBRE_USUARIO as doctor ,
        cl.nombre_cliente as paciente ,
        cl.CODI_CLIENTE as cedula 
        from Historia_Ortodoncia hc
        left join usuarios us on hc.usuario_id = us.ID 
        left join cliente cl on hc.cliente_id = cl.cliente_id 
        where 1=1 and (cl.ID_principal = '{$_SESSION['ID']}' or cl.ID_principal = '{$_SESSION['ID_principal']}')
        "],

    ['nombre' => 'Historia Odontología', 'icono' => 'fa fa-history', 'consulta' => "SELECT 
        hc.*,
        us.NOMBRE_USUARIO as doctor ,
        cl.nombre_cliente as paciente ,
        cl.CODI_CLIENTE as cedula 
        from historia_1_historiadeodontologia94374718321 hc
        left join usuarios us on hc.usuario_id = us.ID 
        left join cliente cl on hc.cliente_id = cl.cliente_id 
        where 1=1 and (cl.ID_principal = '{$_SESSION['ID']}' or cl.ID_principal = '{$_SESSION['ID_principal']}')
        "],
    ['nombre' => 'Historia Periodoncia', 'icono' => 'fa fa-history', 'consulta' => "SELECT
        hc.*,
        us.NOMBRE_USUARIO as doctor ,
        cl.nombre_cliente as paciente ,
        cl.CODI_CLIENTE as cedula 
        from erpdental_dev_baseDental.historia_1_historiadeperiodoncia66280610178 hc
        left join erpdental_dev_baseDental.usuarios us on hc.usuario_id = us.ID 
        left join erpdental_dev_baseDental.cliente cl on hc.cliente_id = cl.cliente_id 
        where 1=1 and (cl.ID_principal = '{$_SESSION['ID']}' or cl.ID_principal = '{$_SESSION['ID_principal']}')
        "],
    ['nombre' => 'Historia Endodoncia', 'icono' => 'fa fa-history', 'consulta' => "SELECT
        hc.*,
        us.NOMBRE_USUARIO as doctor ,
        cl.nombre_cliente as paciente ,
        cl.CODI_CLIENTE as cedula 
        from erpdental_dev_baseDental.historia_1_historiadeendodoncia87480223521 hc
        left join erpdental_dev_baseDental.usuarios us on hc.usuario_id = us.ID 
        left join erpdental_dev_baseDental.cliente cl on hc.cliente_id = cl.cliente_id 
        where 1=1 and (cl.ID_principal = '{$_SESSION['ID']}' or cl.ID_principal = '{$_SESSION['ID_principal']}')
        "],

    ['nombre' => 'Evoluciones', 'icono' => 'fa fa-history', 'consulta' => "SELECT 
        evo.id ,
        us.NOMBRE_USUARIO as doctor ,
        cl.nombre_cliente as paciente ,
        cl.CODI_CLIENTE as cedula ,
        evo.Fecha ,
        evo.Hora ,
        evo.x28234809682 as evolucion
        FROM historia_11_evoluciones69257289778 evo
        left join usuarios us on evo.usuario_id = us.ID 
        left join cliente cl on evo.cliente_id = cl.cliente_id 
        where 1=1 and (cl.ID_principal = '{$_SESSION['ID']}' or cl.ID_principal = '{$_SESSION['ID_principal']}')"],
];
?>
<div class="card-body">
    <?php foreach ($arrayBotonesRespaldos as $boton) { ?>
    <button type="button" class="btn btn-default btn-block text-left" onclick="generarRespaldos('<?= encrypt($boton['consulta']) ?>')">
        Generar Respaldo: 
        <i class="<?= $boton['icono'] ?> text-primary"></i>
        <strong><?= $boton['nombre'] ?>.</strong>
    </button>
    <?php } ?>
</div>