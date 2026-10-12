<?php

$numero = 15;

echo match (true) {
    $numero % 3 === 0 && $numero % 5 === 0 => "Múltiple de 3 i 5",
    $numero % 3 === 0 => "Múltiple de 3",
    $numero % 5 === 0 => "Múltiple de 5",
    default => "No és múltiple de 3 ni de 5"
};