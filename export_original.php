<?php
include_once 'index.php';


$lvivDoc = file_get_contents(__DIR__.'/sitemap2.xml'); // Файл хмл який будем парсити

$lvivXML = simplexml_load_string($lvivDoc);
$lvivLoc = [];

foreach ($lvivXML->url as $urlItem) {
    $lvivLoc[] = page_title(trim($urlItem->loc));
}

file_put_contents(__DIR__.'/lvivski.json', json_encode($lvivLoc)); // Записуємо результат в json
?>