<?php
include('simple_html_dom.php');

// URL de búsqueda de YouTube
$searchQuery = $_GET['q'];
$youtubeUrl = 'https://www.youtube.com/results?search_query=' . urlencode($searchQuery);

// Crear un objeto DOM
$html = file_get_html($youtubeUrl);

if ($html === false) {
    echo 'Error al cargar la página de YouTube';
    exit;
}

// Buscar el primer enlace de video
$videoLink = $html->find('a[href^="/watch"]', 0);

if ($videoLink) {
    // Extraer el ID del video desde el enlace
    parse_str(parse_url($videoLink->href, PHP_URL_QUERY), $params);
    if (isset($params['v'])) {
        echo $params['v'];
    } else {
        echo 'Video no encontrado';
    }
} else {
    echo 'Video no encontrado';
}
?>