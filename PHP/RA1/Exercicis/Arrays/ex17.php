<?php

$preus = [3.44, 34.44, 35.62, 64.32, 32.22, 16.89];
$suma = 0;

foreach ($preus as $preu) {
    $suma += $preu;
}

echo "$suma";