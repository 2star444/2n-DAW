<?php

declare(strict_types=1); //tipatge estricte

function calcularImpostos(float $preu, int $impost): float 
{
    $import = $preu * ($impost / 100);
    
    return $import;
}