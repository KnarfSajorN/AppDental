<!-- Room.php -->
<!DOCTYPE html>
<html>
<head>
    <script>
        const socket = new WebSocket('ws://199.250.208.14:8080'); // Cambia la IP del servidor
        const video = document.getElementById('localVideo');
        // Configurar la conexión WebSocket y enviar el stream al servidor
    </script>
</head>
<body>
    <!-- Mostrar la vista de la cámara del usuario -->
    <video id="localVideo" autoplay muted></video>
</body>
</html>