<?php

$notes = [
    'Matematiques' => 8.5,
    'Catala' => 7,
    'Angles' => 9,
    'Historia' => 6.5,
    'Informatica' => 10
];

$suma = 0;
foreach ($notes as $assignatura => $nota) {
    $suma += $nota;
}

$mitjana = $suma / 5;
echo "Mitjana de les notes: " . $mitjana;
