<?php

$edat = 18;
$preuEntrada;

if ($edat < 12) {
    $preuEntrada = 5;
} elseif ($edat >= 12 && $edat < 65) {
    $preuEntrada = 10; 
} else {
    $preuEntrada = 7; 
}
echo "El preu de l'entrada és: $preuEntrada €";
