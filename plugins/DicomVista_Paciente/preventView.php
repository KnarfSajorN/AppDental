<?php
session_start();
// con este archivo vamos a prevenir la visualizacion de cualquier pantalla, mayormente para impresiones o informacion privada
// recibimos siempre la variable de sesion y $CODI_CLIENTE para hacer la comparacion

// validar session
if ($_SESSION['ID'] || $_SESSION['id']) {
    // hay session activa y no se requiere nada    
} else {
    // no hay session activa
    $cedulaValidar = $_GET['validar'];
    $mensaje = $_GET['mensaje'];
    // se le pide la cedula para validar
?>
    <style>html{
     display: none;   
    }
    body{
     display:none;   
    }</style>
    <script>
        //document.querySelector("html").style.display = "none";
        //document.querySelector("body").style.display = "none";
        window.onload = function() {
            var htmlElement = document.querySelector("html");
            var bodyElement = document.querySelector("body");

            if (htmlElement !== null) {
            htmlElement.style.display = "none";
            }

            if (bodyElement !== null) {
            bodyElement.style.display = "none";
            }
        setTimeout(() => {
            let foo = prompt("<?=$mensaje?>");
        if (foo == "<?php echo $cedulaValidar; ?>") {
            document.querySelector("html").style.display = "block";
            document.querySelector("body").style.display = "block";
            // nada pasa
        } else {
            window.location.href = "https://www.google.com";
        }    
        }, 100);

        };
        
    </script>
<?php
}

?>