<?php

$notes = [3.56, 9.64, 8.35, 5.23];
$suma = 0;
$cont = 0;

foreach ($notes as $nota) {
    $suma += $nota;
    $cont++;
}

echo "Mitja: " . ($suma / $cont);