<?php
function clearInput($value)
{
    include './funciones/conn3.php';
    $replace = array(
        '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
        /*'@<[\/\!]*?[^<>]*?>@si',          // Elimina las etiquetas HTML
        '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo*/
        '@<![\s\S]*?--[ \t\n\r]*>@',        // Elimina los comentarios multi-línea
        '@SELECT.*?FROM@si',
        '@FROM.*?WHERE@si',
        '@UPDATE.*?SET@si',
        '@INSERT INTO.*?SET@si',
        '@DELETE@si', '@SELECT@si',
        '@FROM@si', '@UPDATE@si',
        '@INSERT@si', '@DROP@si',
        '@TRUNCATE@si', '@ALTER@si',
        '@TABLE@si', '@CREATE@si'
    );
    if (is_array($value)) {
        return array_map('clearInput', $value);
    } else {
        return preg_replace($replace, '', mysqli_real_escape_string($conn3, $value));
    }
}
function preparePost($post, $ignor = array())
{
    $data = "";
    $indice = 0;
    if (!is_array($post)) {
        $data = clearInput($post);
    } else {
        foreach ($post as $key => $value) {
            if (!in_array($key, $ignor)) {
                $value = clearInput($value);
                $value = (is_array($value) ? json_encode($value) : $value);
                $data .= "{$key} = '{$value}'" . ($indice == (count($post) - 1) ? "" : ", ");
            }
            $indice++;
        }
    }
    return $data = preg_replace("/, $/", '', $data);
}

echo $prepare = preparePost("Hola SELECT
dasdasdas
sdasdsa
asdasdas
adas prueba <script src='http://www.evilsite.com/bad_script.js'></script> Es un buen día!");

?>
<script type="text/javascript">
    alert("<?php echo $prepare; ?>");
</script>