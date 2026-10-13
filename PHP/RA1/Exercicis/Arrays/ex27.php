<?php

$alumnes = [
    ['nom' => 'Aina', 'nota' => 8],
    ['nom' => 'Bernat', 'nota' => 4.5],
    ['nom' => 'Carla', 'nota' => 6],
    ['nom' => 'Dídac', 'nota' => 3],
    ['nom' => 'Emma', 'nota' => 5]
];

foreach ($alumnes as $alumne) {
    if ($alumne['nota'] >= 5) {
        echo $alumne['nom'] . "<br>";
    }
}
