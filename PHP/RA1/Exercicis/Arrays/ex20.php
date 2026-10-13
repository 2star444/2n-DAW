<?php

$producte = [
    'nom' => 'Quadern',
    'preu' => 3.5,
    'estoc' => 24
];

echo "Fitxa del producte<br>";
foreach ($producte as $clau => $valor) {
    echo $clau . ": " . $valor . "<br>";
}
