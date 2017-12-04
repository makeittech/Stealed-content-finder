<?php

function debug ($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Функція для парсигну тайтлу сторінки
function page_title($url, $reduce = null) {
    $fp = file_get_contents($url);
    if (!$fp)
        return null;

    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res)
        return null;

    $pageArr = [];

    $pageArr['url'] = $url; // Записуємо посилання
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    if($reduce) { // Якщо необхідно обрізати тайтли
        $title = substr($title, 0 , strpos($title, '|') - 1); // Обрізаємо все після "|" в тайтлі
    }
    $title = trim($title); // Очищаємо стрінгу від лишнього
    $pageArr['title'] = $title; // Записуємо тайтл
    return $pageArr;
}
?>