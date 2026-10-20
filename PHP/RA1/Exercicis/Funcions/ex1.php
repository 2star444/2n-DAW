<?php

function calculaPerimetre($base, $alcada)
{
    return (2 * $base) + (2 * $alcada);
}

$perimetre1 = calculaPerimetre(4, 7);
$perimetre2 = calculaPerimetre(3, 5);

echo "Perímetre del primer rectangle: $perimetre1\n";
echo "Perímetre del segon rectangle: $perimetre2\n";