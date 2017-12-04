<?php
include_once 'index.php';

$plgXML = simplexml_load_file(''); // Вказуємо урл хмльки яку будемо парсити

// Потрібно запускати два цикла через спечевічність хмл яку парсимо
foreach ($plgXML->sitemap as $sitemap) {
    $plgLocGlobal = [];
    $plgLoc = simplexml_load_file($sitemap->loc);
    foreach ($plgLoc->url as $urlItem ) {
        $plgLocGlobal[] = page_title(trim($urlItem->loc), true); // Парсимо тайтли і обрізаємо їх
        }
    file_put_contents(__DIR__.'/plagiat.json', json_encode($plgLocGlobal)); // Записуємо результат в json
}
echo 'done';