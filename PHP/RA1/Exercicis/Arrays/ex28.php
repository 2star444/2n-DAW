<?php

$numeros = [12, -5, 8, -3, 0, 17, -10, 4];
$suma = 0;

foreach ($numeros as $numero) {
    if ($numero > 0) {
        $suma += $numero;
    }
}

echo "Suma dels nombres positius: " . $suma;
