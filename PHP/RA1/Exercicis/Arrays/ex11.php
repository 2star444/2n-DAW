<?php

$numero = 100;
$divisions = 0;

echo "Número: $numero<br>";

while ($numero > 1) {
    $numero = floor($numero / 2);
    $divisions++;
    echo "Valor: $numero<br>";
}

echo "Divisions: $divisions";
