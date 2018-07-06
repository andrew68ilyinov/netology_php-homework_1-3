<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.07.2018
 * Time: 23:24
 */

// Массив животных по 3-м материкам
$array_animals = [
    "Africa" => ["Cardioglossa leucomystax", "Heleophryne orientalis", "Hemisus marmoratus", "Petropedetes vulpiae", "Hyperoliidae"],
    "Australia" => ["Thylacinus", "Bettongia gaimardi", "Macropus agilis", "Macropus eugenii", "Sarcophilus harrisii"],
    "Eurasia" => ["Ulemosaurus svijagensis", "Repenomamus giganticus", "Saiga tatarica", "Monedula", "Aquila clanga"],
    "Antarctica" => ["Aptenodytes forsteri", "Lobodon carcinophagus", "Stercorariidae", "Sterna paradisaea", "Cryolophosaurus"]
];

# Вывод заданных животных
echo '<h1>Заданные животные</h1>';
foreach($array_animals as $m => $vid) {
    $materik = $m;
    echo '<h2>'.$materik.'</h2>';
    
    foreach($vid as $vid_animals) {
        echo $vid_animals. '</br>';
    }
}
echo '<hr>';

# Массив животных из двух слов
$animals = [];
$secondWords = []; // Для вторых слов в названии

foreach ($array_animals as $materik => $anim_two_words) {
    foreach ($anim_two_words as $item => $animal) {
        $animalArray = explode (" ", $animal);
        if (count($animalArray) == 2) {
            $animals[$materik][$item] = $animalArray;
        }
    }
}

# Выделяем вторые части названий в новый массив и перемешиваем их
foreach ($animals as $materik) {
    foreach ($materik as $animal) {
        $secondWords[] = $animal[1];
    }
}
shuffle($secondWords);

# Меняем вторые части названий на перемешанные, преобр. в строки.
echo '<h1>Фэнтезийные животные</h1>';

$i = 0;
foreach ($animals as $materik => $animalList) {
    echo "<h2>" . $materik . "</h2>";
    foreach ($animalList as &$animalArray) {
        $animalArray[1] = $secondWords[$i];
        $i++;
        $animalArray = implode(" ", $animalArray);
    }
    $animalList = implode(", ", $animalList);
    echo $animalList;
}
