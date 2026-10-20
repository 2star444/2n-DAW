<?php

function calculaTotal($preu, $unitats, $iva = 0.21)
{
    return ($preu * $unitats) * (1 + $iva);
}

$preu = 5.35;
$unitats = 34;
$iva = 0.33;

echo "Total amb IVA del 33%: " . calculaTotal($preu, $unitats, $iva) . "\n";
echo "Total amb IVA per defecte del 21%: " . calculaTotal($preu, $unitats) . "\n";
