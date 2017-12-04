<?php
$lvivArray = json_decode(file_get_contents(__DIR__ . '\lvivski.json'));
$plagiatArray = json_decode(file_get_contents(__DIR__ . '\plagiat.json'));
$findedLinks = [];

foreach ($lvivArray as $lvivItem) {
    foreach ($plagiatArray as $plagiatItem) {
        if($lvivItem->title == $plagiatItem->title) { // Якщо тайтли однакові, записуємо результат в масив
            $findedLinks[]['Lvivski'] = $lvivItem;
            $findedLinks[]['Plagiat'] = $plagiatItem;
        }
    }
}
file_put_contents(__DIR__.'/result.json', json_encode($findedLinks));
?>