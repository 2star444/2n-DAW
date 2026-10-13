<?php

$fruites = ['poma', 'pera', 'platan', 'taronja', 'maduixa'];
$buscada = 'taronja';
$trobada = false;

foreach ($fruites as $fruita) {
    if ($fruita === $buscada) {
        $trobada = true;
    }
}

if ($trobada) {
    echo "La fruita $buscada es troba a l'array.";
} else {
    echo "La fruita $buscada no es troba a l'array.";
}
