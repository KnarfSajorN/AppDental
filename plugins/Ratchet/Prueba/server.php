<?php
require '../vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new YourWebSocketClass() // Cambia "YourWebSocketClass" por la clase que maneja tu lógica de WebSocket
        )
    ),
    8080
);

$server->run();
?>