<?php

$productes = [
    ['nom' => 'Llapis', 'preu' => 0.8],
    ['nom' => 'Quadern', 'preu' => 3.5],
    ['nom' => 'Motxilla', 'preu' => 24.9],
    ['nom' => 'Regle', 'preu' => 1.2]
];

$total = 0;
foreach ($productes as $producte) {
    $total += $producte['preu'];
}

echo "Preu total: " . $total . " euros";
