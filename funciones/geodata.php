<?php
function XgetIpUser() {
    foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
        if (array_key_exists($key, $_SERVER)) {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
    return '?';
}

$geoData = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=".XgetIpUser()));
date_default_timezone_set($geoData['geoplugin_timezone']);
?>
<?php if (!empty($_GET['view_URI_geoData'])): ?>
    <script>
        console.log("<?= "http://www.geoplugin.net/php.gp?ip=".XgetIpUser() ?>");
        console.log("<?= "http://www.geoplugin.net/json.gp?ip=".XgetIpUser() ?>");
    </script>
<?php endif ?>