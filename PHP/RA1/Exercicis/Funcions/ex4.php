<?php

function suma(int $a, int $b): int
{
    return $a + $b;
}

$a = 2.5;
$b = 5;

// Sense declare(strict_types=1) PHP força els decimals a enters.
echo "Suma d'enters: " . suma(2, 5) . "\n";
echo "Suma amb decimals: " . suma($a, 5.8) . "\n";
