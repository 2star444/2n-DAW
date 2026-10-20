<?php

function valoraNota($nota): int|string
{
    return $nota >= 5 ? (int) $nota : "Suspès";
}

$nota1 = 4;
$nota2 = 7;

echo "Nota $nota1: " . valoraNota($nota1) . "\n";
echo "Nota $nota2: " . valoraNota($nota2) . "\n";