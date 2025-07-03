<?php
include '../funciones/conn3.php';


$tablas = [

    "ws_filtro" => "CREATE TABLE `ws_filtro` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `filtro` text DEFAULT NULL,
        `activo` int(11) DEFAULT 1,
        PRIMARY KEY (`id`)
    )",
    "ws_mensajes" => "CREATE TABLE `ws_mensajes` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `usuarioId` int(11) DEFAULT 0,
        `fecha` timestamp NULL DEFAULT current_timestamp(),
        `titulo` longtext DEFAULT NULL,
        `mensaje` longtext DEFAULT NULL,
        `filtro` longtext DEFAULT NULL,
        `filtroAZ` text DEFAULT NULL,
        `activo` int(11) DEFAULT 1,
        PRIMARY KEY (`id`)
    )",
    "ws_archivos" => "CREATE TABLE `ws_archivos` (
        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        `usuario_id` int(11) DEFAULT NULL,
        `descripcion` text DEFAULT NULL,
        `alias` text DEFAULT NULL,
        `url` text DEFAULT NULL,
        `activo` int(11) DEFAULT 1 COMMENT '0: INACTIVO, 1: ACTIVO;',
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
    )",
    "ws_mensajesC" => "CREATE TABLE `ws_mensajesC` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `usuarioId` int(11) DEFAULT 0,
            `fecha` timestamp NULL DEFAULT current_timestamp(),
            `titulo` longtext DEFAULT NULL,
            `mensaje` longtext DEFAULT NULL,
            `banner` longtext DEFAULT NULL,
            `asunto` longtext DEFAULT NULL,
            `filtro` longtext DEFAULT NULL,
            `filtroAZ` text DEFAULT NULL,
            `activo` int(11) DEFAULT 1,
            PRIMARY KEY (`id`)
        )",
    "ws_correo" => "CREATE TABLE `ws_correo` (
        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        `usuario_id` int(11) DEFAULT NULL,
        `setFrom` text null default null,
        `Username` text null default null,
        `Password` text null default null,
        `Host` text null default null,
        `Port` text null default null,
        PRIMARY KEY (`id`)
    )",
];

foreach ($tablas as $key => $value) {
    $table = mysqli_query($conn3, "SELECT 1 FROM {$key}");
    if (!$table) {
        $create = mysqli_query($conn3, $value) or die(mysqli_error($conn3));
    }
}

// ahora validar campos de tablas existentes
$campos = [
    ["tabla" => "usuarios", "campo" => "estadoDenys"],
];

foreach ($campos as $key => $value) {
    // verificar si el campo ya existe
    $query = mysqli_query($conn3, "SHOW COLUMNS FROM {$value['tabla']} where `Field` = '{$value['campo']}'");
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        // existe
    }else{
        // no existe
        $query = mysqli_query($conn3, "ALTER TABLE {$value['tabla']} ADD column {$value['campo']} text null default null");
    }
}
