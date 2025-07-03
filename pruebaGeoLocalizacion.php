<?php
include './funciones/funciones.php';
function getGeocodeData($address)
{
    $address = urlencode($address);
    $googleMapUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBSld35xjYl71WCtIapFSA4w1xSgiD-hiQ";
    $geocodeResponseData = file_get_contents($googleMapUrl);
    $responseData = json_decode($geocodeResponseData, true);
    if ($responseData['status'] == 'OK') {
        $latitude = isset($responseData['results'][0]['geometry']['location']['lat']) ? $responseData['results'][0]['geometry']['location']['lat'] : "";
        $longitude = isset($responseData['results'][0]['geometry']['location']['lng']) ? $responseData['results'][0]['geometry']['location']['lng'] : "";
        $formattedAddress = isset($responseData['results'][0]['formatted_address']) ? $responseData['results'][0]['formatted_address'] : "";
        if ($latitude && $longitude && $formattedAddress) {
            $geocodeData = array();
            array_push(
                $geocodeData,
                $latitude,
                $longitude,
                $formattedAddress
            );
            return $geocodeData;
        } else {
            return false;
        }
    } else {
        echo "ERROR: {$responseData['status']}";
        return false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div><strong>Tú puedes encontrar ejemplos de direcciones que se pueden localizar para ver en el mapa:</strong></div>
        <div>1. Hospital La Mancha Centro</div>
        <div>2. C/ Alcalá, 34</div>
    </div>
    <br>
    <form action="" method="post">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type='text' name='searchAddress' class="form-control" placeholder='Pon la dirección aquí' />
                </div>
            </div>
            <div class="form-group">
                <input type='submit' value='Localizar' class="btn btn-success" />
            </div>
        </div>
    </form>
    <?php
    if ($_POST) {
        $geocodeData = getGeocodeData($_POST['searchAddress']);
        if ($geocodeData) {
            $latitude = $geocodeData[0];
            $longitude = $geocodeData[1];
            $address = $geocodeData[2];
    ?>
            <div id="gmap">Cargando mapa...</div>
            <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBSld35xjYl71WCtIapFSA4w1xSgiD-hiQ"></script>
            <script type="text/javascript">
                function init_map() {
                    var options = {
                        zoom: 14,
                        center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map($("#gmap")[0], options);
                    marker = new google.maps.Marker({
                        map: map,
                        position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
                    });
                    infowindow = new google.maps.InfoWindow({
                        content: "<?php echo $address; ?>"
                    });
                    google.maps.event.addListener(marker, "click", function() {
                        infowindow.open(map, marker);
                    });
                }
                google.maps.event.addDomListener(window, 'load', init_map);
            </script>
    <?php
        } else {
            echo "Detalles incorrectos!";
        }
    }
    ?>
</body>

</html>