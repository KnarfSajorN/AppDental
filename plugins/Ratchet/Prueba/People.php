<!-- People.php -->
<!DOCTYPE html>
<html>
<head>
    <script>
        const socket = new WebSocket('ws://199.250.208.14:8080'); // Cambia la IP del servidor
        const video = document.getElementById('remoteVideo');
        // Configurar la conexión WebSocket y recibir el stream del servidor
    </script>
</head>
<body>
    <!-- Mostrar el video y audio del usuario en la sala -->
    <video id="remoteVideo" autoplay></video>
</body>
</html>